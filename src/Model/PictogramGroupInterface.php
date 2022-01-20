<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Model;

use Asdoria\SyliusPictogramPlugin\Model\Aware\PictogramsAwareInterface;
use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;

/**
 * Class PictogramGroupInterface
 * @package Asdoria\SyliusPictogramPlugin\Model
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
interface PictogramGroupInterface extends ResourceInterface, PictogramsAwareInterface, TranslatableInterface, CodeAwareInterface
{
    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void;

    /**
     * @return int|null
     */
    public function getPosition(): ?int;

    /**
     * @param int|null $position
     */
    public function setPosition(?int $position): void;
}
