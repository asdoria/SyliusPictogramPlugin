<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class PictogramType
 * @package Asdoria\SyliusPictogramPlugin\Form\Type
 */
class PictogramGroupType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => PictogramGroupTranslationType::class,
                'label'      => 'asdoria.form.pictogram.translations',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'sylius_pictogram_group';
    }
}
