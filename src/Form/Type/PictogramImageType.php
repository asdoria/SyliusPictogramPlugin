<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Form\Type;

use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class PictogramImageType
 * @package Asdoria\SyliusPictogramPlugin\Form\Type
 */
class PictogramImageType extends ImageType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('file', FileType::class, [
                'label' => 'asdoria.form.pictogram_image.file',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'sylius_pictogram_image';
    }
}
