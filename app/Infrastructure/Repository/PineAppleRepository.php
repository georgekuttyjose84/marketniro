<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\CurrencyValue;
use App\Domain\Entity\PineApple;
use App\Domain\Enum\Method;
use App\Domain\Enum\PineAppleType;
use App\Domain\Repository\PineAppleRepositoryInterface;
use PDO;

class PineAppleRepository implements PineAppleRepositoryInterface
{
    public function __construct(private PDO $pdo) {}

    public function getLatestPrice(): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM pineapple_price ORDER BY id DESC LIMIT 2"
        );

        $stmt->execute();

        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $pineApples = [];

        foreach ($rows as $row) {
            $pineApples[] = new PineApple(
                id: (int) $row['id'],
                type: PineAppleType::from($row['type']),
                minPrice: (float) $row['min_price'],
                maxPrice: (float) $row['max_price'],
                avgPrice: (float) $row['avg_price'],
                priceDate: $row['price_date'],
                method: Method::from($row['method']),
                createdAt: (new \DateTimeImmutable())->setTimestamp((int) $row['created_at'])
            );
        }

        return $pineApples;
    }

    public function getLastThreeMonthsPriceSummary(): array
    {
        $stmt = $this->pdo->prepare(
            "
        SELECT
            type,
            YEAR(price_date) AS year,
            MONTH(price_date) AS month,
            DATE_FORMAT(price_date, '%M %Y') AS month_name,
            MIN(avg_price) AS min_price,
            MAX(avg_price) AS max_price,
            AVG(avg_price) AS avg_price
        FROM pineapple_price
        WHERE price_date >= DATE_FORMAT(
            DATE_SUB(CURDATE(), INTERVAL 2 MONTH),
            '%Y-%m-01'
        )
        GROUP BY
            type,
            YEAR(price_date),
            MONTH(price_date)
        ORDER BY
            year DESC,
            month DESC,
            type ASC
        "
        );

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLastSevenDaysPrice(): array
    {
        $stmt = $this->pdo->prepare(
            "
        SELECT
            price_date,

            MAX(
                CASE
                    WHEN type = 'green'
                    THEN avg_price
                END
            ) AS green,

            MAX(
                CASE
                    WHEN type = 'ripe'
                    THEN avg_price
                END
            ) AS ripe

        FROM pineapple_price

        WHERE price_date IN (
            SELECT price_date
            FROM (
                SELECT DISTINCT price_date
                FROM pineapple_price
                ORDER BY price_date DESC
                LIMIT 7
            ) AS latest_dates
        )

        GROUP BY price_date

        ORDER BY price_date ASC
        "
        );

        $stmt->execute();

        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(
            static function (array $row): array {
                return [
                    'price_date' => $row['price_date'],
                    'green' => $row['green'] !== null
                        ? (float) $row['green']
                        : null,
                    'ripe' => $row['ripe'] !== null
                        ? (float) $row['ripe']
                        : null,
                ];
            },
            $rows
        );
    }
    public function findSelectedDate(string $date): array
    {
        $stmt = $this->pdo->prepare(
            "
        SELECT *
        FROM pineapple_price
        WHERE price_date = :price_date
        ORDER BY
            CASE type
                WHEN 'green' THEN 1
                WHEN 'ripe' THEN 2
            END
        "
        );

        $stmt->execute([
            'price_date' => $date,
        ]);

        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $pineApples = [];

        foreach ($rows as $row) {
            $pineApples[] = new PineApple(
                id: (int) $row['id'],
                type: PineAppleType::from($row['type']),
                minPrice: (float) $row['min_price'],
                maxPrice: (float) $row['max_price'],
                avgPrice: (float) $row['avg_price'],
                priceDate: $row['price_date'],
                method: Method::from($row['method']),
                createdAt: (new \DateTimeImmutable())
                    ->setTimestamp((int) $row['created_at'])
            );
        }

        return $pineApples;
    }

    public function getPriceHistory(string $period): array
    {
        $interval = match ($period) {
            '1M' => '1 MONTH',
            '3M' => '3 MONTH',
            '6M' => '6 MONTH',
            '1Y' => '1 YEAR',
            default => throw new \InvalidArgumentException(
                'Invalid pineapple price history period.'
            ),
        };

        $sql = "
        SELECT
            price_date,

            MAX(
                CASE
                    WHEN type = 'green'
                    THEN avg_price
                END
            ) AS green,

            MAX(
                CASE
                    WHEN type = 'ripe'
                    THEN avg_price
                END
            ) AS ripe

        FROM pineapple_price

        WHERE price_date >= DATE_SUB(
            CURDATE(),
            INTERVAL {$interval}
        )

        GROUP BY price_date

        ORDER BY price_date ASC
    ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(
            static function (array $row): array {
                return [
                    'price_date' => $row['price_date'],

                    'green' => $row['green'] !== null
                        ? (float) $row['green']
                        : null,

                    'ripe' => $row['ripe'] !== null
                        ? (float) $row['ripe']
                        : null,
                ];
            },
            $rows
        );
    }
}
