<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class PictogramTranslationType
 * @package Asdoria\SyliusPictogramPlugin\Form\Type
 *
 * @author  Hugo Duval <hugo.duval@asdoria.com>
 */
class PictogramTranslationType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false,
                'label'    => 'asdoria.form.pictogram.name',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'sylius_pictogram_translation';
    }
}
