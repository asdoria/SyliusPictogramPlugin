<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Model\Aware;

use Asdoria\SyliusPictogramPlugin\Model\PictogramInterface;
use Doctrine\Common\Collections\Collection;

/**
 * Interface PictogramsAwareInterface
 * @package Asdoria\SyliusPictogramPlugin\Model\Aware
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
interface PictogramsAwareInterface
{
    /**
     * @return Collection
     */
    public function getPictograms(): Collection;

    /**
     * @return bool
     */
    public function hasPictograms(): bool;

    /**
     * @param PictogramInterface $pictogram
     *
     * @return bool
     */
    public function hasPictogram(PictogramInterface $pictogram): bool;

    /**
     * @param PictogramInterface $pictogram
     */
    public function addPictogram(PictogramInterface $pictogram): void;

    /**
     * @param PictogramInterface $pictogram
     */
    public function removePictogram(PictogramInterface $pictogram): void;

}
