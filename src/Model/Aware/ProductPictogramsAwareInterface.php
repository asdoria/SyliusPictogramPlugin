<?php

declare(strict_types=1);


namespace Asdoria\SyliusPictogramPlugin\Model\Aware;


use Asdoria\SyliusPictogramPlugin\Model\ProductPictogramInterface;
use Doctrine\Common\Collections\Collection;

/**
 * Interface ProductPictogramsAwareInterface
 * @package Asdoria\SyliusPictogramPlugin\Model\Aware
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
interface ProductPictogramsAwareInterface
{
    /**
     * {@inheritdoc}
     */
    public function getProductPictograms(): Collection;

    /**
     * {@inheritdoc}
     */
    public function hasProductPictograms(): bool;

    /**
     * {@inheritdoc}
     */
    public function hasProductPictogram(ProductPictogramInterface $productPictogram): bool;

    /**
     * {@inheritdoc}
     */
    public function addProductPictogram(ProductPictogramInterface $productPictogram): void;

    /**
     * {@inheritdoc}
     */
    public function removeProductPictogram(ProductPictogramInterface $productPictogram): void;

}
