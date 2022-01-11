<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Entity;

use Asdoria\SyliusPictogramPlugin\Model\PictogramGroupTranslationInterface;
use Asdoria\SyliusPictogramPlugin\Traits\NamingTrait;
use Asdoria\SyliusPictogramPlugin\Traits\ResourceTrait;
use Sylius\Component\Resource\Model\AbstractTranslation;

/**
 * Class PictogramGroupTranslation
 * @package Asdoria\SyliusPictogramPlugin\Entity
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
class PictogramGroupTranslation extends AbstractTranslation implements PictogramGroupTranslationInterface
{
    use ResourceTrait;
    use NamingTrait;
}
