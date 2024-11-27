<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class OtpMessageResponseDTO
{
    /**
     * @param array<OtpItemDTO> $items
     */
    public function __construct(
        private array  $items,
        private string $totalCost
    )
    {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            items: array_map(fn(array $item) => OtpItemDTO::fromResponse($item),$response['items']),
            totalCost: $response['totalCost']
        );
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotalCost(): string
    {
        return $this->totalCost;
    }
}