<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Factory\Model;

use Asdoria\SyliusPictogramPlugin\Model\PictogramGroupInterface;
use Asdoria\SyliusPictogramPlugin\Model\PictogramInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

/**
 * Interface PictogramFactoryInterface
 * @package Asdoria\SyliusPictogramPlugin\Factory\Model
 */
interface PictogramFactoryInterface extends FactoryInterface
{
    /**
     * @param PictogramGroupInterface $pictogramGroup
     *
     * @return PictogramInterface
     */
    public function createForPictogramGroup(PictogramGroupInterface $pictogramGroup): PictogramInterface;
}
