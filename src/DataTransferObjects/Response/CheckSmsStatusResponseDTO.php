<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class CheckSmsStatusResponseDTO
{
    public function __construct(
        private array $items,
    )
    {
    }

    public static function fromResponse(array $response): self
    {

        return new self(
            items: array_map(fn(array $item) => CheckSmsStatusResponseItemDTO::fromResponse($item), $response),
        );
    }

    public function getItems(): array
    {
        return $this->items;
    }

}