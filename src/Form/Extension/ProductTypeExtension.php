<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Form\Extension;

use Asdoria\SyliusPictogramPlugin\Entity\Pictogram;
use Asdoria\SyliusPictogramPlugin\Form\Type\PictogramChoiceType;
use Asdoria\SyliusPictogramPlugin\Model\PictogramInterface;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ProductTypeExtension
 * @package Asdoria\SyliusPictogramPlugin\Form\Extension
 */
class ProductTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pictograms', PictogramChoiceType::class, [
                'class'        => Pictogram::class,
                'multiple'     => true,
                'label'        => false,
                'group_by'     => function ($choice, $key, $value) {
                    return ($choice instanceof PictogramInterface) ?
                        $choice->getPictogramGroup() : 'none';
                },
                'choice_label' => 'code',
            ]);
    }

    /**
     * Gets the extended types.
     *
     * @return string[]
     */
    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
