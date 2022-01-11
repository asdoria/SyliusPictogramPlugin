<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Model;

use Sylius\Component\Attribute\Model\AttributeInterface;
use Sylius\Component\Attribute\Model\AttributeValueInterface as BaseAttributeValueInterface;

/**
 * Interface PictogramAttributeValueInterface
 * @package Asdoria\SyliusPictogramPlugin\Model
 */
interface PictogramAttributeValueInterface extends BaseAttributeValueInterface
{
    /**
     * @return PictogramInterface|null
     */
    public function getPictogram(): ?PictogramInterface;

    /**
     * @param PictogramInterface|null $pictogram
     */
    public function setPictogram(?PictogramInterface $pictogram): void;

    /**
     * @return AttributeInterface|null
     */
    public function getAttribute(): ?AttributeInterface;

    /**
     * @param AttributeInterface|null $attribute
     */
    public function setAttribute(?AttributeInterface $attribute): void;
}
