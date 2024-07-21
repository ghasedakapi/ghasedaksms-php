<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class SingleMessageResponseDTO
{
    public function __construct(
        private string $receptor,
        private string $lineNumber,
        private int    $cost,
        private string $messageId,
        private string $message,
        private string $sendDate
    )
    {
    }

    public function getReceptor(): string
    {
        return $this->receptor;
    }

    public function getLineNumber(): string
    {
        return $this->lineNumber;
    }

    public function getCost(): int
    {
        return $this->cost;
    }

    public function getMessageId(): string
    {
        return $this->messageId;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getSendDate(): string
    {
        return $this->sendDate;
    }

    public static function fromResponse(?array $response): self
    {
        return new self(
            receptor: $response['receptor'],
            lineNumber: $response['lineNumber'],
            cost: $response['cost'],
            messageId: $response['messageId'],
            message: $response['message'],
            sendDate: $response['sendDate']
        );
    }
}