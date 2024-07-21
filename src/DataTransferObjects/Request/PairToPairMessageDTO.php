<?php

namespace Ghasedak\DataTransferObjects\Request;

readonly class PairToPairMessageDTO
{
    /**
     * @param array<SingleMessageDTO> $items
     */
    public function __construct(
        private array $items,
        private ?bool  $udh = false
    )
    {
    }

    /**
     * @return SingleMessageDTO[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function isUdh(): bool
    {
        return $this->udh;
    }

    public function toArray(): array
    {
        return [
            'items' => array_map(fn (SingleMessageDTO $singleMessageDTO) => $singleMessageDTO->toArray(), $this->items),
            'udh' => $this->udh
        ];
    }
}