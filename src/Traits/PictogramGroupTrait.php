<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Traits;

use Asdoria\SyliusPictogramPlugin\Model\PictogramGroupInterface;

/**
 * Trait PictogramGroupTrait
 * @package Asdoria\SyliusPictogramPlugin\Traits
 */
trait PictogramGroupTrait
{
    /** @var PictogramGroupInterface|null */
    protected $pictogramGroup;

    /**
     * @return PictogramGroupInterface|null
     */
    public function getPictogramGroup(): ?PictogramGroupInterface
    {
        return $this->pictogramGroup;
    }

    /**
     * @param PictogramGroupInterface|null $pictogramGroup
     */
    public function setPictogramGroup(?PictogramGroupInterface $pictogramGroup): void
    {
        $this->pictogramGroup = $pictogramGroup;
    }
}
