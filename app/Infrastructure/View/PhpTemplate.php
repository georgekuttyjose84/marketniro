<?php

namespace App\Infrastructure\View;

final class PhpTemplate
{
    public function __construct(
        private string $basePath = __DIR__ . '/../../../templates'
    ) {}

    public function render(string $template, array $data = [], ?string $layout = 'layouts/main'): string
    {
        $content = $this->renderFile($template, $data);

        if ($layout === null) {
            return $content;
        }

        $data['content'] = $content;

        return $this->renderFile($layout, $data);
    }

    private function renderFile(string $relativePath, array $data): string
    {
        $file = rtrim($this->basePath, '/') . '/' . ltrim($relativePath, '/') . '.tpl.php';

        if (!is_file($file)) {
            throw new \RuntimeException("Template not found: {$file}");
        }

        extract($data, EXTR_SKIP);

        ob_start();
        require $file;
        return (string) ob_get_clean();
    }
}