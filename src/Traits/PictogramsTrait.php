<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Traits;

use Asdoria\SyliusPictogramPlugin\Entity\Pictogram;
use Asdoria\SyliusPictogramPlugin\Model\PictogramInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait PictogramsTrait
 * @package Asdoria\SyliusPictogramPlugin\Traits
 */
trait PictogramsTrait
{
    /**
     * @var Collection
     *
     * @ORM\ManyToMany(
     *      targetEntity="Asdoria\SyliusPictogramPlugin\Model\PictogramInterface",
     *      inversedBy="products")
     * @ORM\JoinTable(
     *      name="asdoria_products_pictograms",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="pictogram_id", referencedColumnName="id")}
     *      )
     */
    protected Collection $pictograms;

    /**
     * PictogramsTrait constructor.
     */
    public function initializePictogramsCollection()
    {
        $this->pictograms = new ArrayCollection();
    }

    /**
     * @return Collection
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

    /**
     * @param string $pictogramGroupCode
     *
     * @return Collection
     */
    public function getAllPictogramByGroupCode(string $pictogramGroupCode) : Collection
    {
        return $this->pictograms->filter(function (Pictogram $pictograms) use ($pictogramGroupCode) {
            return $pictograms->getPictogramGroup()->getCode() === $pictogramGroupCode;
        });
    }

    /**
     * @return array
     *
     * @param Collection $pictograms
     */
    public function getAllGroupsFromPictograms(Collection $pictograms) : array
    {
        $groups = [];

        /** @var Pictogram $pictogram */
        foreach ($pictograms as $pictogram) {
            array_push($groups, $pictogram->getPictogramGroup());
        }

        return array_unique($groups);
    }
}
