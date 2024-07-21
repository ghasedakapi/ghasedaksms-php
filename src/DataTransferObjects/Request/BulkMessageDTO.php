<?php

namespace Ghasedak\DataTransferObjects\Request;

use DateTimeInterface;

readonly class BulkMessageDTO
{

    /**
     * @param array<string> $receptors
     */
    public function __construct(
        private DateTimeInterface $sendDate,
        private string            $lineNumber,
        private array             $receptors,
        private string            $message,
        private ?bool              $isVoice = false,
        private ?bool              $udh = false,
        private ?string           $clientReferenceId = null,
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

    public function getReceptors(): array
    {
        return $this->receptors;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getClientReferenceId(): string
    {
        return $this->clientReferenceId;
    }

    public function isVoice(): bool
    {
        return $this->isVoice;
    }

    public function isUdh(): bool
    {
        return $this->udh;
    }

    public function toArray(): array
    {
        return [
            'sendDate' => $this->sendDate->format('c'),
            'lineNumber' => $this->lineNumber,
            'receptors' => $this->receptors,
            'message' => $this->message,
            'clientReferenceId' => $this->clientReferenceId,
            'isVoice' => $this->isVoice,
            'udh' => $this->udh
        ];
    }
}