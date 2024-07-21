<?php

namespace Ghasedak\DataTransferObjects\Request;

use DateTimeInterface;

readonly class OtpMessageDTO
{

    /**
     * @param array<ReceptorDTO> $receptors
     * @param array<InputDTO> $inputs
     */
    public function __construct(
        private DateTimeInterface $sendDate,
        private array             $receptors,
        private string            $templateName,
        private array             $inputs,
        private ?bool             $udh = false,
        private ?bool             $isVoice = false
    )
    {
    }

    public function getUdh(): ?bool
    {
        return $this->udh;
    }

    public function getIsVoice(): ?bool
    {
        return $this->isVoice;
    }

    public function isUdh(): bool
    {
        return $this->udh;
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

    /**
     * @return InputDTO[]
     */
    public function getInputs(): array
    {
        return $this->inputs;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'sendDate' => $this->sendDate->format('c'),
            'receptors' => array_map(fn(ReceptorDTO $receptorDTO) => $receptorDTO->toArray(), $this->receptors),
            'templateName' => $this->templateName,
            'inputs' => array_map(fn(InputDTO $inputDTO) => $inputDTO->toArray(), $this->inputs),
            'udh' => $this->udh,
            'isVoice' => $this->isVoice
        ];
    }
}