<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Model\Aware;

use Asdoria\SyliusPictogramPlugin\Model\PictogramInterface;

/**
 * Interface PictogramAwareInterface
 * @package Asdoria\SyliusPictogramPlugin\Model\Aware
 */
interface PictogramAwareInterface
{
    /**
     * @return PictogramInterface|null
     */
    public function getPictogram(): ?PictogramInterface;

    /**
     * @param PictogramInterface|null $pictogram
     */
    public function setPictogram(?PictogramInterface $pictogram): void;
}
