<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class ReceivedSmsItemDTO
{
    public function __construct(
        private int    $id,
        private string $message,
        private string $sender,
        private string $lineNumber,
        private string $receiveDate
    )
    {
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public static function fromResponse(?array $response): ?self
    {
        if (!$response) return null;
        return new self(
            id: $response['id'],
            message: $response['message'],
            sender: $response['sender'],
            lineNumber: $response['lineNumber'],
            receiveDate: $response['receiveDate']
        );
    }

    public static function fromResponseArray(array $array): array
    {
        return array_map(fn($item) => self::fromResponse($item), $array);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getLineNumber(): string
    {
        return $this->lineNumber;
    }

    public function getReceiveDate(): string
    {
        return $this->receiveDate;
    }
}