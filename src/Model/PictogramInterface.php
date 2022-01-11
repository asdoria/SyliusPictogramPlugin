<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Model;

use Asdoria\SyliusPictogramPlugin\Model\Aware\PictogramGroupAwareInterface;
use Asdoria\SyliusPictogramPlugin\Model\Aware\SortableAwareInterface;
use Sylius\Component\Core\Model\ImageAwareInterface;
use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;

/**
 * Interface PictogramInterface
 * @package Asdoria\SyliusPictogramPlugin\Model
 */
interface PictogramInterface extends
    ResourceInterface,
    ImageAwareInterface,
    PictogramGroupAwareInterface,
    SortableAwareInterface,
    TranslatableInterface,
    CodeAwareInterface
{
    /**
     * @return null|string
     */
    public function getPath(): ?string;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void;

}
