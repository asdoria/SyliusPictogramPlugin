<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class SyliusPictogramPlugin
 * @package Asdoria\Bundle\PictogramBundle
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
final class AsdoriaSyliusPictogramPlugin extends Bundle
{
    use SyliusPluginTrait;

    /**
     * @return array
     */
    public function getSupportedDrivers(): array
    {
        return [
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
        ];
    }
}
