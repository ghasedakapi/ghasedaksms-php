<?php

namespace Ghasedak\DataTransferObjects\Request;

readonly class GetOtpTemplateParametersDTO
{
    public function __construct(
        private string $templateName
    )
    {
    }

    public function getTemplateName(): string
    {
        return $this->templateName;
    }

    public function toArray(): array
    {
        return [
            'TemplateName' => $this->templateName
        ];
    }
}