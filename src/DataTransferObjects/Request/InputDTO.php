<?php

namespace Ghasedak\DataTransferObjects\Request;

readonly class InputDTO
{
    public function __construct(
        private string $param,
        private string $value,
    )
    {
    }

    public function getParam(): string
    {
        return $this->param;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function toArray(): array
    {
        return [
            'param' => $this->param,
            'value' => $this->value
        ];
    }
}