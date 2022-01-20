<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Entity;

use Asdoria\SyliusPictogramPlugin\Model\PictogramImageInterface;
use Asdoria\SyliusPictogramPlugin\Traits\ResourceTrait;
use Sylius\Component\Core\Model\Image;

/**
 * Description of PictogramImage.
 *
 * @author pvesin
 */
class PictogramImage extends Image implements PictogramImageInterface
{
    use ResourceTrait;
}


