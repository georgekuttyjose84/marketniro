<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\RubberPrice;
use App\Domain\Enum\Method;
use App\Domain\Enum\RubberGrade;
use App\Domain\Enum\RubberMarketType;
use App\Domain\Enum\RubberPlace;
use App\Domain\Repository\RubberPriceRepositoryInterface;
use DateTimeImmutable;
use PDO;

class RubberPriceRepository implements
    RubberPriceRepositoryInterface
{
    public function __construct(
        private PDO $pdo
    ) {}


    public function getLatestDomesticPrices(): array
    {
        return $this->getLatestPricesByMarketType(
            RubberMarketType::DOMESTIC
        );
    }


    public function getLatestInternationalPrices(): array
    {
        return $this->getLatestPricesByMarketType(
            RubberMarketType::INTERNATIONAL
        );
    }


    private function getLatestPricesByMarketType(
        RubberMarketType $marketType
    ): array {

        $stmt = $this->pdo->prepare(
            "
            SELECT
                id,
                amount_in_rupee,
                amount_in_dollar,
                grade,
                place,
                market_type,
                price_date,
                method,
                created_at

            FROM rubber_price

            WHERE market_type = :market_type

            AND price_date = (

                SELECT MAX(price_date)

                FROM rubber_price

                WHERE market_type = :latest_market_type

            )

            ORDER BY
                place ASC,
                id ASC
            "
        );

        $stmt->execute([
            'market_type' =>
                $marketType->value,

            'latest_market_type' =>
                $marketType->value,
        ]);

        $rows = $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );

        $result = [];

        foreach ($rows as $row) {

            $rubberPrice = $this->map(
                $row
            );

            $result[
            $rubberPrice->place->value
            ][] = $rubberPrice;
        }

        return $result;
    }

    public function getLatestPricesByMarketTypeAndPlace(
        RubberMarketType $marketType,
        RubberPlace $place,
        RubberGrade $grade
    ): array {

        $stmt = $this->pdo->prepare(
            "
            SELECT
                id,
                amount_in_rupee,
                amount_in_dollar,
                grade,
                place,
                market_type,
                price_date,
                method,
                created_at
            FROM rubber_price
            WHERE market_type = :market_type and place = :place and grade = :grade
            AND price_date = (
                SELECT MAX(price_date)
                FROM rubber_price
                WHERE market_type = :latest_market_type
            )
            ORDER BY
                place ASC,
                id ASC
            "
        );

        $stmt->execute([
            'market_type' => $marketType->value,
            'latest_market_type' => $marketType->value,
            'place' => $place->value,
            'grade' => $grade->value,
        ]);

        $rows = $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );

        $result = [];

        foreach ($rows as $row) {

            $rubberPrice = $this->map(
                $row
            );

            $result[
            $rubberPrice->place->value
            ][] = $rubberPrice;
        }

        return $result;
    }


    private function map(
        array $row
    ): RubberPrice {

        return new RubberPrice(

            id:
            (int) $row['id'],

            amountInRupee:
            (float) $row['amount_in_rupee'],

            amountInDollar:
            (float) $row['amount_in_dollar'],

            grade:
            RubberGrade::from(
                $row['grade']
            ),

            place:
            RubberPlace::from(
                $row['place']
            ),

            marketType:
            RubberMarketType::from(
                $row['market_type']
            ),

            priceDate:
            $row['price_date'],

            method:
            Method::from(
                $row['method']
            ),

            createdAt:
            (new DateTimeImmutable())
                ->setTimestamp(
                    (int) $row['created_at']
                )

        );
    }

    public function getLatestPricesByMarketTypeAndPlaceIndicator(
        RubberMarketType $marketType,
        RubberPlace $place,
        RubberGrade $grade
    ): array
    {
        $stmt = $this->pdo->prepare("
                SELECT
                    amount_in_rupee as price_information,
                    price_date
                FROM rubber_price
                WHERE market_type = :market_type
                  AND place = :place
                  AND grade = :grade
                ORDER BY price_date DESC, id DESC
                LIMIT 2
            ");

        $stmt->execute([
            'market_type' => $marketType->value,
            'place' => $place->value,
            'grade' => $grade->value,
        ]);

        $prices = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $prices;
    }

}