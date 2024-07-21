<?php

namespace Ghasedak\DataTransferObjects\Response;

use Ghasedak\DataTransferObjects\Request\SingleMessageDTO;

readonly class PairToPairMessageResponseDTO
{
    /**
     * @param array<SingleMessageDTO> $items
     */
    public function __construct(
        private array $items
    )
    {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            items:  array_map(fn(array $item) => SingleMessageResponseDTO::fromResponse($item),$response['items']),
        );
    }

    public function getItems(): array
    {
        return $this->items;
    }
}