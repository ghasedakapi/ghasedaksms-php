<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class ReceivedSmsResponseDTO
{
    /**
     * @param array<ReceivedSmsItemDTO> $items
     */
    public function __construct(
        private array $items
    )
    {
    }

    public static function fromResponse(?array $response): ?self
    {
        if (!$response) return null;
        return new self(
            items: ReceivedSmsItemDTO::fromResponseArray($response['items']),
        );
    }

    public function getItems(): array
    {
        return $this->items;
    }
}