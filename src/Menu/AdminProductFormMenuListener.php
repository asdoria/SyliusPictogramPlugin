<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Menu;

use Sylius\Bundle\AdminBundle\Event\ProductMenuBuilderEvent;

/**
 * Class AdminProductFormMenuListener
 * @package Asdoria\SyliusPictogramPlugin\Menu
 *
 * @author  Hugo Duval <hugo.duval@asdoria.com>
 */
final class AdminProductFormMenuListener
{
    /**
     * @param ProductMenuBuilderEvent $event
     */
    public function addItems(ProductMenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $menu
            ->addChild('pictograms')
            ->setAttribute('template', '@AsdoriaSyliusPictogramPlugin/Admin/Product/_pictograms.html.twig')
            ->setLabel('asdoria.ui.pictograms');
    }
}
