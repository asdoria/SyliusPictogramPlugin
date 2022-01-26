<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Menu;

use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

/**
 * Class AdminMenuListener
 * @package Asdoria\SyliusPictogramPlugin\Menu
 *
 * @author  Hugo Duval <hugo.duval@asdoria.com>
 */
final class AdminMenuListener
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $catalog = $menu->getChild('catalog');

        if ($catalog) {
            $this->addChild($catalog);
        } else {
            $this->addChild($menu->getFirstChild());
        }
    }

    /**
     * @param ItemInterface $item
     */
    private function addChild(ItemInterface $item): void
    {
        $item
            ->addChild('pictogram_groups', [
                'route' => 'asdoria_admin_pictogram_group_index',
            ])
            ->setLabel('asdoria.menu.admin.main.pictogram_groups.header')
            ->setLabelAttribute('icon', 'building');
    }
}
