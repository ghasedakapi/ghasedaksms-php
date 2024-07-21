<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class OtpTemplateResponseDTO
{
    public function __construct(
        private array  $params,
        private string $message
    )
    {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            params: $response['params'],
            message: $response['message']
        );
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}