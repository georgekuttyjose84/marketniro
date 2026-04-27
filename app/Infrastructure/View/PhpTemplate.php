<?php

namespace App\Infrastructure\View;

class PhpTemplate
{
    private string $path;
    private array $parameters = [];

    public function __construct(string $path, array $parameters = [])
    {
        $this->path = rtrim($path, '/') . '/';
        $this->parameters = $parameters;
    }

    /**
     * MAIN RENDER FUNCTION
     */
    public function render(string $view, array $context = []): string
    {
        // 1. Render page content
        $content = $this->load('pages/' . $view, $context);

        // 2. Inject into layout
        return $this->load('layouts/main', array_merge($context, [
            'content' => $content
        ]));
    }

    /**
     * INTERNAL LOADER
     */
    private function load(string $view, array $context): string
    {
        $file = $this->path . $view . '.tpl.php';

        if (!file_exists($file)) {
            throw new \RuntimeException(sprintf('Template not found: %s', $file));
        }

        extract($context);

        ob_start();
        include $file;

        return ob_get_clean();
    }

    /**
     * GLOBAL PARAMETERS (optional use)
     */
    public function get(string $key): mixed
    {
        return $this->parameters[$key] ?? null;
    }
}
