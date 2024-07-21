<?php

namespace Ghasedak\DataTransferObjects\Request;

use DateTimeInterface;

readonly class SingleMessageDTO
{
    public function __construct(
        private DateTimeInterface $sendDate,
        private string            $lineNumber,
        private string            $receptor,
        private string            $message,
        private ?string           $clientReferenceId = null,
        private ?bool             $udh = false,
    )
    {
    }

    public function getSendDate(): DateTimeInterface
    {
        return $this->sendDate;
    }

    public function getLineNumber(): string
    {
        return $this->lineNumber;
    }

    public function getReceptor(): string
    {
        return $this->receptor;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getClientReferenceId(): string
    {
        return $this->clientReferenceId;
    }

    public function isUdh(): bool
    {
        return $this->udh;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'sendDate' => $this->sendDate->format('c'),
            'lineNumber' => $this->lineNumber,
            'receptor' => $this->receptor,
            'message' => $this->message,
            'clientReferenceId' => $this->clientReferenceId,
            'udh' => $this->udh,
        ];
    }
}