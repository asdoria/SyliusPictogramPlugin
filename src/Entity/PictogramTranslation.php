<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Entity;

use Asdoria\SyliusPictogramPlugin\Model\PictogramTranslationInterface;
use Asdoria\SyliusPictogramPlugin\Traits\NamingTrait;
use Asdoria\SyliusPictogramPlugin\Traits\ResourceTrait;
use Sylius\Component\Resource\Model\AbstractTranslation;

/**
 * Class PictogramTranslation
 * @package App\Entity
 */
class PictogramTranslation extends AbstractTranslation implements PictogramTranslationInterface
{
    use ResourceTrait;
    use NamingTrait;
}
