<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Model\Aware;

use Asdoria\SyliusPictogramPlugin\Model\PictogramGroupInterface;

/**
 * Interface PictogramGroupAwareInterface
 * @package Asdoria\SyliusPictogramPlugin\Model\Aware
 */
interface PictogramGroupAwareInterface
{
    /**
     * @return PictogramGroupInterface|null
     */
    public function getPictogramGroup(): ?PictogramGroupInterface;

    /**
     * @param PictogramGroupInterface|null $pictogramGroup
     */
    public function setPictogramGroup(?PictogramGroupInterface $pictogramGroup): void;
}
