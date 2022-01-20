<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Factory;

use Asdoria\SyliusPictogramPlugin\Factory\Model\PictogramFactoryInterface;
use Asdoria\SyliusPictogramPlugin\Model\PictogramGroupInterface;
use Asdoria\SyliusPictogramPlugin\Model\PictogramInterface;

/**
 * Class PictogramFactory
 * @package Asdoria\SyliusPictogramPlugin\Factory
 */
final class PictogramFactory implements PictogramFactoryInterface
{
    /**
     * @var string
     */
    private string $className;

    /**
     * PictogramFactory constructor.
     *
     * @param string $className
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * {@inheritdoc}
     */
    public function createNew(): PictogramInterface
    {
        return new $this->className();
    }

    /**
     * @param PictogramGroupInterface $pictogramGroup
     *
     * @return PictogramInterface
     */
    public function createForPictogramGroup(PictogramGroupInterface $pictogramGroup): PictogramInterface
    {
        $pictogram = $this->createNew();
        $pictogram->setPictogramGroup($pictogramGroup);

        return $pictogram;
    }
}
