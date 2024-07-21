<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class ReceptorResponseDTO
{
    public function __construct(
        private string $receptor,
        private string $messageId
    )
    {
    }

    public static function fromResponse(array $response): self
    {
        return new self(receptor: $response['receptor'], messageId: $response['messageId']);
    }

    public function getReceptor(): string
    {
        return $this->receptor;
    }

    public function getMessageId(): string
    {
        return $this->messageId;
    }
}