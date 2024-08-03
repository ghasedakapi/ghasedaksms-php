<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class OtpItemDTO
{
    public function __construct(
        private string $receptor,
        private int    $cost,
        private string $messageId,
        private ?string $clientReferenceId,
        private string $sendDate
    )
    {
    }

    public function getClientReferenceId(): string
    {
        return $this->clientReferenceId;
    }

    public function getReceptor(): string
    {
        return $this->receptor;
    }

    public function getCost(): int
    {
        return $this->cost;
    }

    public function getMessageId(): string
    {
        return $this->messageId;
    }

    public function getSendDate(): string
    {
        return $this->sendDate;
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            receptor: $response['receptor'],
            cost: $response['cost'],
            messageId: $response['messageId'],
            clientReferenceId: $response['clientReferenceId'],
            sendDate: $response['sendDate']
        );
    }
}