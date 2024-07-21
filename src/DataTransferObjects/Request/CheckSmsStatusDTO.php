<?php

namespace Ghasedak\DataTransferObjects\Request;

readonly class CheckSmsStatusDTO
{
    public function __construct(
        private array $ids,
        private int   $type
    )
    {
    }

    public function getIds(): array
    {
        return $this->ids;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function toArray(): array
    {
        return [
            'Ids' => implode(',', $this->ids),
            'type' => $this->type
        ];
    }
}