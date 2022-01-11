<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Form\Extension;


use App\Entity\Product\Product;
use App\Model\Product\ProductInterface;
use Asdoria\SyliusPictogramPlugin\Entity\Pictogram;
use Asdoria\SyliusPictogramPlugin\Form\Type\PictogramChoiceType;
use Asdoria\SyliusPictogramPlugin\Model\PictogramInterface;
use Doctrine\ORM\EntityRepository;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceAutocompleteChoiceType;
use Sylius\Bundle\TaxonomyBundle\Form\Type\TaxonAutocompleteChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

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
                'class'         => Pictogram::class,
                'multiple'      => true,
                'label'      =>  false,
                'group_by' => function($choice, $key, $value) {
                        return ($choice instanceof PictogramInterface) ?
                            $choice->getPictogramGroup() : 'none';
                },
                'choice_label'  => 'code',
            ])
        ;
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
