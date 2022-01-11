<?php


declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Form\Type;

use Asdoria\SyliusPictogramPlugin\Model\PictogramGroupInterface;
use Sylius\Bundle\ResourceBundle\Form\Type\FixedCollectionType;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ProductPictogramGroupsType
 * @package Asdoria\SyliusPictogramPlugin\Form\Type
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
 class ProductPictogramGroupsType extends AbstractType
{
    /** @var RepositoryInterface */
    private $pictogramGroupRepository;

    /** @var DataTransformerInterface */
    private $productsToPictogramGroupsTransformer;

    public function __construct(
        RepositoryInterface $pictogramGroupRepository,
        DataTransformerInterface $productsToPictogramGroupsTransformer
    ) {
        $this->pictogramGroupRepository = $pictogramGroupRepository;
        $this->productsToPictogramGroupsTransformer = $productsToPictogramGroupsTransformer;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addModelTransformer($this->productsToPictogramGroupsTransformer);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'entries' => $this->pictogramGroupRepository->findAll(),
            'entry_type' => TextType::class,
            'entry_name' => function (PictogramGroupInterface $productPictogramGroup) {
                return $productPictogramGroup->getCode();
            },
            'entry_options' => function (PictogramGroupInterface $productPictogramGroup) {
                return [
                    'label' => $productPictogramGroup->getName(),
                ];
            },
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent(): string
    {
        return FixedCollectionType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'sylius_product_pictogram_groups';
    }
}
