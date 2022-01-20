<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Entity;

use Asdoria\SyliusPictogramPlugin\Traits\ProductsTrait;
use Asdoria\SyliusPictogramPlugin\Model\PictogramImageInterface;
use Asdoria\SyliusPictogramPlugin\Model\PictogramInterface;
use Asdoria\SyliusPictogramPlugin\Model\PictogramTranslationInterface;
use Asdoria\SyliusPictogramPlugin\Traits\CodeTrait;
use Asdoria\SyliusPictogramPlugin\Traits\ImageTrait;
use Asdoria\SyliusPictogramPlugin\Traits\PictogramGroupTrait;
use Asdoria\SyliusPictogramPlugin\Traits\ResourceTrait;
use Asdoria\SyliusPictogramPlugin\Traits\SortableTrait;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;

/**
 * Description of Pictogram.
 *
 * @author pvesin
 *
 */
class Pictogram implements PictogramInterface
{
    use CodeTrait;
    use ProductsTrait;
    use ResourceTrait;
    use ImageTrait;
    use PictogramGroupTrait;
    use SortableTrait;

    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
        getTranslation as private doGetTranslation;
    }

    /**
     * Pictogram constructor.
     */
    public function __construct()
    {
        $this->initializeTranslationsCollection();
        $this->initializeProductsCollection();
    }

    /**
     * @return null|string
     */
    public function getPath(): ?string
    {
        if (!$this->getImage() instanceof PictogramImageInterface) {
            return null;
        }

        return $this->getImage()->getPath();
    }

    /**
     * @return string|null
     */
    public function __toString() {
        return $this->getName();
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getTranslation()->getName();
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->getTranslation()->setName($name);
    }

    /**
     * @param null|string $locale
     *
     * @return TranslationInterface
     */
    public function getTranslation(?string $locale = null): TranslationInterface
    {
        /** @var PictogramTranslationInterface $translation */
        $translation = $this->doGetTranslation($locale);

        return $translation;
    }

    /**
     * {@inheritdoc}
     */
    protected function createTranslation(): PictogramTranslationInterface
    {
        return new PictogramTranslation();
    }
}
