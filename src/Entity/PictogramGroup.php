<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Entity;

use Asdoria\SyliusPictogramPlugin\Model\PictogramGroupInterface;
use Asdoria\SyliusPictogramPlugin\Model\PictogramGroupTranslationInterface;
use Asdoria\SyliusPictogramPlugin\Model\PictogramTranslationInterface;
use Asdoria\SyliusPictogramPlugin\Traits\CodeTrait;
use Asdoria\SyliusPictogramPlugin\Traits\NamingTrait;
use Asdoria\SyliusPictogramPlugin\Traits\PictogramsTrait;
use Asdoria\SyliusPictogramPlugin\Traits\ResourceTrait;
use Asdoria\SyliusPictogramPlugin\Traits\SortableTrait;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;

/**
 * Class PictogramGroup
 * @package Asdoria\SyliusPictogramPlugin\Entity
 */
class PictogramGroup implements PictogramGroupInterface
{
    use ResourceTrait;
    use PictogramsTrait;
    use NamingTrait;
    use CodeTrait;
    use SortableTrait;

    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
        getTranslation as private doGetTranslation;
    }

    /**
     * PictogramGroup constructor.
     */
    public function __construct()
    {
        $this->initializeTranslationsCollection();
        $this->initializePictogramsCollection();
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
    protected function createTranslation(): PictogramGroupTranslationInterface
    {
        return new PictogramGroupTranslation();
    }

}
