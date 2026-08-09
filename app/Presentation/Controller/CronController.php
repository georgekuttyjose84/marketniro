<?php

declare(strict_types=1);

namespace App\Presentation\Controller;

use App\Application\Service\FetchExchangeRates;
use App\Application\Service\FetchPineapple;
use App\Application\Service\FetchRubberPrice;
use App\Http\Response\HtmlResponse;
use App\Infrastructure\View\PhpTemplate;
use Throwable;

class CronController
{
    public function run(string $job): void
    {
        /*
         * Do not allow service output to be sent directly
         * to the browser.
         */
        ob_start();

        try {

            switch ($job) {

                case 'rubber':

                    $service = new FetchRubberPrice();

                    $service->run();

                    $message = 'Rubber prices updated successfully.';

                    break;


                case 'exchange-rates':

                    $service = new FetchExchangeRates();

                    $service->run();

                    $message = 'Exchange rates updated successfully.';

                    break;


                case 'pineapple':

                    $service = new FetchPineapple();

                    $service->run();

                    $message = 'Pineapple prices updated successfully.';

                    break;


                default:

                    ob_end_clean();

                    http_response_code(404);

                    header('Content-Type: application/json');

                    echo json_encode([
                        'success' => false,
                        'job' => $job,
                        'message' => 'Unknown cron job.'
                    ]);

                    return;
            }


            /*
             * Capture everything printed by the service.
             */
            $output = ob_get_clean();


            /*
             * Return ONLY JSON to the browser.
             */
            header('Content-Type: application/json');

            echo json_encode([
                'success' => true,
                'job' => $job,
                'message' => $message,
                'output' => trim($output)
            ]);

        } catch (Throwable $e) {

            /*
             * Clean any output generated before the exception.
             */
            $output = ob_get_clean();

            http_response_code(500);

            header('Content-Type: application/json');

            echo json_encode([
                'success' => false,
                'job' => $job,
                'message' => $e->getMessage(),
                'output' => trim($output)
            ]);
        }
    }


    public function index(): HtmlResponse
    {
        $engine = new PhpTemplate(__DIR__ . '/../../../templates');


        return new HtmlResponse(
            $engine->render(
                'admin/cron',
                [
                    'page' => [
                        'title' => '',
                        'description' => '',
                        'canonical' => '',
                        'h1' => '',
                        'breadcrumb' => '',
                    ],
                ]
            )
        );

    }
}