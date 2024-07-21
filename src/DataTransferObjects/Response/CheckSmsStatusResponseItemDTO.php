<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class CheckSmsStatusResponseItemDTO
{
    public function __construct(
        private string $messageId,
        private ?string $clientReferenceId,
        private string $message,
        private string $lineNumber,
        private string $receptor,
        private int    $status,
        private int    $price,
        private string $sendDate
    )
    {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            messageId: $response['receptor'],
            clientReferenceId: $response['clientReferenceId'],
            message: $response['message'],
            lineNumber: $response['lineNumber'],
            receptor: $response['receptor'],
            status: $response['status'],
            price: $response['price'],
            sendDate: $response['sendDate']
        );
    }

    public function getMessageId(): string
    {
        return $this->messageId;
    }

    public function getClientReferenceId(): string
    {
        return $this->clientReferenceId;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getLineNumber(): string
    {
        return $this->lineNumber;
    }

    public function getReceptor(): string
    {
        return $this->receptor;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getSendDate(): string
    {
        return $this->sendDate;
    }
}