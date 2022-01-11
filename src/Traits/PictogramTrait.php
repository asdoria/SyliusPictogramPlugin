<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Traits;


use Asdoria\SyliusPictogramPlugin\Model\PictogramInterface;

/**
 * Trait PictogramTrait
 * @package Asdoria\SyliusPictogramPlugin\Traits
 */
trait PictogramTrait
{

    /** @var PictogramInterface|null */
    protected $pictogram;

    /**
     * @return PictogramInterface|null
     */
    public function getPictogram(): ?PictogramInterface
    {
        return $this->pictogram;
    }

    /**
     * @param PictogramInterface|null $pictogram
     */
    public function setPictogram(?PictogramInterface $pictogram): void
    {
        $this->pictogram = $pictogram;
    }
}
