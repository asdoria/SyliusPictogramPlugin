<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Form\Type;

use Asdoria\SyliusPictogramPlugin\Entity\PictogramGroup;
use Asdoria\SyliusPictogramPlugin\Entity\PictogramImage;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class PictogramType
 * @package Asdoria\SyliusPictogramPlugin\Form\Type
 */
class PictogramType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => PictogramTranslationType::class,
                'label'      => 'asdoria.form.pictogram.translations',
            ])
            ->add('pictogramGroup', EntityType::class, [
                'label' => 'asdoria.form.pictogram.pictogram_group',
                'class' => PictogramGroup::class,
            ])
            ->add('image', PictogramImageType::class, [
                'label'      => 'asdoria.form.pictogram.main_image',
                'data_class' => PictogramImage::class,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'sylius_pictogram';
    }
}
