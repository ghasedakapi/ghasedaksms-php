<?php

namespace Ghasedak\DataTransferObjects\Response;

readonly class ReceivedSmsPagingResponseDTO
{
    /**
     * @param array<ReceivedSmsItemDTO> $items
     */
    public function __construct(
        private int   $pageIndex,
        private int   $pageSize,
        private int   $totalCount,
        private bool  $hasPreviousPage,
        private bool  $hasNextPage,
        private array $items,
    )
    {
    }

    public static function fromResponse(?array $response): ?self
    {
        if (!$response) return null;
        return new self(
            pageIndex: $response['pageIndex'],
            pageSize: $response['pageSize'],
            totalCount: $response['totalCount'],
            hasPreviousPage: $response['totalPages'],
            hasNextPage: $response['hasPreviousPage'],
            items: ReceivedSmsItemDTO::fromResponseArray($response['items']),
        );
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getPageIndex(): int
    {
        return $this->pageIndex;
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    public function isHasPreviousPage(): bool
    {
        return $this->hasPreviousPage;
    }

    public function isHasNextPage(): bool
    {
        return $this->hasNextPage;
    }
}