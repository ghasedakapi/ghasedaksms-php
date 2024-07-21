<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class AccountInformationResponseDTO
{
    public function __construct(
        private int    $credit,
        private string $expireDate,
        private string $plan
    )
    {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            credit: $response['credit'],
            expireDate: $response['expireDate'],
            plan: $response['plan']
        );
    }

    public function getCredit(): int
    {
        return $this->credit;
    }

    public function getExpireDate(): string
    {
        return $this->expireDate;
    }

    public function getPlan(): string
    {
        return $this->plan;
    }
}