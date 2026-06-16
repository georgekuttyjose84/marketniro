<?php

namespace App\Http;

class JsonResponse
{
    private int $status;

    public function __construct(
        private mixed $data,
        int $status = 200
    ) {
        $this->status = $status;
    }

    public function send(): void
    {
        http_response_code($this->status);

        header(
            'Content-Type: application/json; charset=utf-8'
        );

        echo json_encode(
            $this->normalize($this->data),
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );

        exit;
    }

    private function normalize(mixed $value): mixed
    {
        if (is_array($value)) {

            return array_map(
                fn ($item) => $this->normalize($item),
                $value
            );

        }

        if (is_object($value)) {

            if ($value instanceof \JsonSerializable) {

                return $value->jsonSerialize();

            }

            return get_object_vars($value);

        }

        return $value;
    }
}