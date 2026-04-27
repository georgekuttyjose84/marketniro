<?php

namespace App\Http;

class Request
{
    private array $query;
    private array $body;
    private string $method;

    public function __construct()
    {
        $this->query = $_GET;
        $this->body = $_POST;
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function method(): string
    {
        return $this->method;
    }

    public function isPost(): bool
    {
        return $this->method === 'post';
    }

    public function isGet(): bool
    {
        return $this->method === 'get';
    }

    private function input(string $key, mixed $default = null): mixed
    {
        return $this->body[$key] ?? $this->query[$key] ?? $default;
    }

    public function getString(string $key, string $default = ''): string
    {
        return (string) $this->input($key, $default);
    }

    public function getInt(string $key, int $default = 0): int
    {
        return (int) $this->input($key, $default);
    }

    public function getDate(string $key, string|\DateTimeImmutable|null $default = null): ?\DateTimeImmutable
    {
        $value = $this->input($key);

        if (!$value) return $default;

        return new \DateTimeImmutable($value);
    }

    public function all(): array
    {
        return array_merge($this->query, $this->body);
    }
}
