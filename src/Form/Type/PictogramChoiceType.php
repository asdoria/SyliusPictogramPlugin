<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PictogramChoiceType
 * @package Asdoria\SyliusPictogramPlugin\Form\Type
 */
class PictogramChoiceType extends AbstractType
{
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'widget'   => 'pictogram_choice_widget',
            'expanded' => true
        ]);
    }

    /**
     * @return string|null
     */
    public function getParent(): ?string
    {
        return EntityType::class;
    }
}
