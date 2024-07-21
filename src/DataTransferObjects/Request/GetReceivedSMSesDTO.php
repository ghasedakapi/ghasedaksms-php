<?php

namespace Ghasedak\DataTransferObjects\Request;

readonly class GetReceivedSMSesDTO
{
    public function __construct(
        private string $lineNumber,
        private ?bool  $isRead = null
    )
    {
    }

    public function getLineNumber(): string
    {
        return $this->lineNumber;
    }

    public function isRead(): bool
    {
        return $this->isRead;
    }

    public function toArray(): array
    {
        $returnArray = ['LineNumber' => $this->lineNumber];
        if ($this->isRead !== null) {
            $returnArray['IsRead'] = $this->isRead ? 'true' : 'false';
        }
        return $returnArray;
    }


}