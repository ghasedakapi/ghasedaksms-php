<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class BulkMessageResponseDTO
{
    /**
     * @param array<ReceptorResponseDTO> $receptors
     */
    public function __construct(
        private array $receptors,
        private string $lineNumber,
        private int    $cost,
        private string $message,
        private string $sendDate
    )
    {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            receptors: array_map(fn(array $item) => ReceptorResponseDTO::fromResponse($item), $response['receptors']),
            lineNumber: $response['lineNumber'],
            cost: $response['cost'],
            message: $response['message'],
            sendDate: $response['sendDate']
        );
    }

    public function getReceptor(): array
    {
        return $this->receptors;
    }

    public function getLineNumber(): string
    {
        return $this->lineNumber;
    }

    public function getCost(): int
    {
        return $this->cost;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getSendDate(): string
    {
        return $this->sendDate;
    }
}