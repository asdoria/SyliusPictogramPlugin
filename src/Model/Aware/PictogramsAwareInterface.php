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
     * {@inheritdoc}
     */
    public function getPictograms(): Collection;

    /**
     * {@inheritdoc}
     */
    public function hasPictograms(): bool;

    /**
     * {@inheritdoc}
     */
    public function hasPictogram(PictogramInterface $pictogram): bool;

    /**
     * {@inheritdoc}
     */
    public function addPictogram(PictogramInterface $pictogram): void;

    /**
     * {@inheritdoc}
     */
    public function removePictogram(PictogramInterface $pictogram): void;

}
