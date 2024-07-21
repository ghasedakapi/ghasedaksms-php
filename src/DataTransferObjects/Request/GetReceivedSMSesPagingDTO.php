<?php

namespace Ghasedak\DataTransferObjects\Request;

use DateTimeInterface;

readonly class GetReceivedSMSesPagingDTO
{
    public function __construct(
        private string             $lineNumber,
        private ?DateTimeInterface $startDate = null,
        private ?DateTimeInterface $endDate = null,
        private ?int               $pageIndex = null,
        private ?int               $pageSize = null,
        private ?bool              $isRead = null
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

    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }

    public function getEndDate(): DateTimeInterface
    {
        return $this->endDate;
    }

    public function getPageIndex(): int
    {
        return $this->pageIndex;
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function toArray(): array
    {
        $returnArray = [
            'LineNumber' => $this->lineNumber,
            'StartDate' => $this->startDate?->format('c'),
            'EndDate' => $this->endDate?->format('c'),
            'PageIndex' => $this->pageIndex,
            'pageSize' => $this->pageSize
        ];
        if ($this->isRead !== null) {
            $returnArray['IsRead'] = $this->isRead ? 'true' : 'false';
        }

        return $returnArray;
    }
}