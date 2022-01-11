<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Traits;

use Asdoria\SyliusPictogramPlugin\Model\PictogramInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Trait PictogramsTrait
 * @package Asdoria\SyliusPictogramPlugin\Traits
 */
trait PictogramsTrait
{
    /** @var Collection|null */
    protected $pictograms;

    /**
     * PictogramsTrait constructor.
     */
    public function initializePictogramsCollection()
    {
        $this->pictograms = new ArrayCollection();
    }

    /**
     * @return Collection|null
     */
    public function getPictograms(): Collection
    {
        return $this->pictograms;
    }

    /**
     * @return bool
     */
    public function hasPictograms(): bool
    {
        return !$this->pictograms->isEmpty();
    }

    /**
     * @param PictogramInterface $pictogram
     *
     * @return bool
     */
    public function hasPictogram(PictogramInterface $pictogram): bool
    {
        return $this->pictograms->contains($pictogram);
    }

    /**
     * @param PictogramInterface $pictogram
     */
    public function addPictogram(PictogramInterface $pictogram): void
    {
        $this->pictograms->add($pictogram);
    }

    /**
     * @param PictogramInterface $pictogram
     */
    public function removePictogram(PictogramInterface $pictogram): void
    {
        if ($this->hasPictogram($pictogram)) {
            $this->pictograms->removeElement($pictogram);
        }
    }
}
