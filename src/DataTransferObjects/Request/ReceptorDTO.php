<?php

namespace Ghasedak\DataTransferObjects\Request;

readonly class ReceptorDTO
{
    public function __construct(
        private string  $mobile,
        private ?string $clientReferenceId = null,
    )
    {
    }

    public function getMobile(): string
    {
        return $this->mobile;
    }

    public function getClientReferenceId(): string
    {
        return $this->clientReferenceId;
    }

    public function toArray(): array
    {
        return [
            'mobile' => $this->mobile,
            'clientReferenceId' => $this->clientReferenceId
        ];
    }
}