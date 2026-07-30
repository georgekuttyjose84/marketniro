<?php

namespace App\Infrastructure\View;

final class PhpTemplate
{
    public function __construct(
        private string $basePath = __DIR__ . '/../../../templates'
    ) {
    }
    public function render(
        string $template,
        array $data = [],
        ?string $layout = 'layouts/main'
    ): string {

        $content = $this->renderFile(
            $template,
            $data
        );

        if ($layout === null) {
            return $content;
        }

        $data['content'] = $content;

        return $this->renderFile(
            $layout,
            $data
        );
    }

    /**
     * Render a reusable partial/component.
     *
     * Partials are rendered WITHOUT a layout.
     *
     * Example:
     *
     * <?= $view->partial('components/header') ?>
     */
    public function partial(
        string $template,
        array $data = []
    ): string {
        return $this->renderFile(
            $template,
            $data
        );
    }

    /**
     * Render the actual .tpl.php file.
     */
    private function renderFile(
        string $relativePath,
        array $data = []
    ): string {
        $file =
            rtrim($this->basePath, '/')
            . '/'
            . ltrim($relativePath, '/')
            . '.tpl.php';

        if (!is_file($file)) {
            throw new \RuntimeException(
                "Template not found: {$file}"
            );
        }

        /*
         * Make this template engine available
         * inside every template as $view.
         */
        $view = $this;

        extract(
            $data,
            EXTR_SKIP
        );

        ob_start();

        try {
            require $file;

            return (string) ob_get_clean();
        } catch (\Throwable $exception) {
            /*
             * Clean the output buffer if
             * rendering the template fails.
             */
            ob_end_clean();

            throw $exception;
        }
    }
}