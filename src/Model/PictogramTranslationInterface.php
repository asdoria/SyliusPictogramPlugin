<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Model;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

/**
 * Interface PictogramTranslationInterface
 * @package Asdoria\SyliusPictogramPlugin\Model
 */
interface PictogramTranslationInterface extends ResourceInterface, TranslationInterface
{
    /**
     * @return string
     */
    public function getName(): ?string;

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void;
}
