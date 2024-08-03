<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class SingleMessageResponseDTO
{
    public function __construct(
        private string  $lineNumber,
        private string  $receptor,
        private string  $messageId,
        private int     $cost,
        private ?string $clientReferenceId,
        private string  $sendDate,
        private string  $message
    )
    {
    }

    public static function fromResponse(?array $response): self
    {
        return new self(
            lineNumber: $response['lineNumber'],
            receptor: $response['receptor'],
            messageId: $response['messageId'],
            cost: $response['cost'],
            clientReferenceId: $response['clientReferenceId'],
            sendDate: $response['sendDate'],
            message: $response['message']
        );
    }

    public function getClientReferenceId(): string
    {
        return $this->clientReferenceId;
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
}