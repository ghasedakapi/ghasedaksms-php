<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class OtpMessageResponseDTO
{
    /**
     * @param array<OtpItemDTO> $items
     */
    public function __construct(
        private string $lineNumber,
        private string $messageBody,
        private array  $items,
        private string $totalCost
    )
    {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            lineNumber: $response['lineNumber'],
            messageBody: $response['messageBody'],
            items: array_map(fn(array $item) => OtpItemDTO::fromResponse($item),$response['items']),
            totalCost: $response['totalCost']
        );
    }

    public function getLineNumber(): string
    {
        return $this->lineNumber;
    }

    public function getMessageBody(): string
    {
        return $this->messageBody;
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