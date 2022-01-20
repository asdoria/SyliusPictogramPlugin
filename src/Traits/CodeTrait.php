<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Traits;

/**
 * Trait CodeTrait
 * @package Asdoria\SyliusPictogramPlugin\Traits
 */
trait CodeTrait
{
    /**
     * @var string|null
     */
    protected ?string $code = null;

    /**
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }
}
