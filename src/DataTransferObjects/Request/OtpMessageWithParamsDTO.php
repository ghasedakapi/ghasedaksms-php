<?php

namespace Ghasedak\DataTransferObjects\Request;

use DateTimeInterface;

readonly class OtpMessageWithParamsDTO
{

    /**
     * @param array<ReceptorDTO> $receptors
     */
    public function __construct(
        private DateTimeInterface $sendDate,
        private array             $receptors,
        private string            $templateName,
        private ?string           $param1 = null,
        private ?string           $param2 = null,
        private ?string           $param3 = null,
        private ?string           $param4 = null,
        private ?string           $param5 = null,
        private ?string           $param6 = null,
        private ?string           $param7 = null,
        private ?string           $param8 = null,
        private ?string           $param9 = null,
        private ?string           $param10 = null,
        private ?bool              $isVoice = false,
        private ?bool              $udh = false,
    )
    {
    }

    public function getSendDate(): DateTimeInterface
    {
        return $this->sendDate;
    }

    /**
     * @return ReceptorDTO[]
     */
    public function getReceptors(): array
    {
        return $this->receptors;
    }

    public function getTemplateName(): string
    {
        return $this->templateName;
    }

    public function getParam1(): string
    {
        return $this->param1;
    }

    public function getParam2(): string
    {
        return $this->param2;
    }

    public function getParam3(): string
    {
        return $this->param3;
    }

    public function getParam4(): string
    {
        return $this->param4;
    }

    public function getParam5(): string
    {
        return $this->param5;
    }

    public function getParam6(): string
    {
        return $this->param6;
    }

    public function getParam7(): string
    {
        return $this->param7;
    }

    public function getParam8(): string
    {
        return $this->param8;
    }

    public function getParam9(): string
    {
        return $this->param9;
    }

    public function getParam10(): string
    {
        return $this->param10;
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
            'receptors' => array_map(fn(ReceptorDTO $receptorDTO) => $receptorDTO->toArray(), $this->receptors),
            'templateName' => $this->templateName,
            'param1' => $this->param1,
            'param2' => $this->param2,
            'param3' => $this->param3,
            'param4' => $this->param4,
            'param5' => $this->param5,
            'param6' => $this->param6,
            'param7' => $this->param7,
            'param8' => $this->param8,
            'param9' => $this->param9,
            'param10' => $this->param10,
            'isVoice' => $this->isVoice,
            'udh' => $this->udh
        ];
    }
}