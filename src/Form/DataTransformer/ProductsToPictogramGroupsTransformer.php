<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Form\DataTransformer;

use App\Model\PictogramGroupInterface;
use App\Model\PictogramInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Product\Repository\ProductRepositoryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class ProductsToPictogramGroupsTransformer
 * @package Asdoria\SyliusPictogramPlugin\Form\DataTransformer
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
class ProductsToPictogramGroupsTransformer implements DataTransformerInterface
{
    /** @var FactoryInterface */
    private $pictogramFactory;

    /** @var ProductRepositoryInterface */
    private $productRepository;

    /** @var RepositoryInterface */
    private $pictogramGroupRepository;

    /** @var Collection */
    private $pictograms;

    /**
     * ProductsToPictogramsTransformer constructor.
     *
     * @param FactoryInterface           $pictogramFactory
     * @param ProductRepositoryInterface $productRepository
     * @param RepositoryInterface        $pictogramGroupRepository
     */
    public function __construct(
        FactoryInterface $pictogramFactory,
        ProductRepositoryInterface $productRepository,
        RepositoryInterface $pictogramGroupRepository
    )
    {
        $this->pictogramFactory        = $pictogramFactory;
        $this->productRepository                = $productRepository;
        $this->pictogramGroupRepository = $pictogramGroupRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($pictograms)
    {
        $this->setPictograms($pictograms);

        if (null === $pictograms) {
            return '';
        }

        $values = [];

        /** @var PictogramInterface $pictogram */
        foreach ($pictograms as $pictogram) {
            $values[$pictogram->getPictogramGroup()->getCode()] = $pictogram->getCode();
        }

        return $values;
    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($values): ?Collection
    {
        if (null === $values || '' === $values || !is_array($values)) {
            return null;
        }

        $pictograms = new ArrayCollection();
        foreach ($values as $pictogramGroupCode => $productCodes) {
            if (null === $productCodes) {
                continue;
            }

            /** @var PictogramInterface $pictogram */
            $pictogram = $this->getPictogramByGroupCode($pictogramGroupCode);
            $this->setAssociatedProductsByProductCodes($pictogram, $productCodes);
            $pictograms->add($pictogram);
        }

        $this->setPictograms(null);

        return $pictograms;
    }

    /**
     * @param Collection $products
     *
     * @return string|null
     */
    private function getCodesAsStringFromProducts(Collection $products): ?string
    {
        if ($products->isEmpty()) {
            return null;
        }

        $codes = [];

        /** @var ProductInterface|ProductVariantInterface $product */
        foreach ($products as $product) {
            $codes[] = $product->getCode();
        }

        return implode(',', $codes);
    }

    /**
     * @param string $pictogramGroupCode
     *
     * @return PictogramInterface
     */
    private function getPictogramByGroupCode(string $pictogramGroupCode): PictogramInterface
    {
        /** @var PictogramInterface $pictogram */
        foreach ($this->pictograms as $pictogram) {
            if ($pictogramGroupCode === $pictogram->getPictogramGroup()->getCode()) {
                return $pictogram;
            }
        }

        /** @var PictogramGroupInterface $pictogramGroup */
        $pictogramGroup = $this->pictogramGroupRepository->findOneBy([
            'code' => $pictogramGroupCode,
        ]);

        /** @var PictogramInterface $pictogram */
        $pictogram = $this->pictogramFactory->createNew();
        $pictogram->setPictogramGroup($pictogramGroup);

        return $pictogram;
    }

    /**
     * @param PictogramInterface $pictogram
     * @param string                      $productCodes
     */
    private function setAssociatedProductsByProductCodes(
        PictogramInterface $pictogram,
        string $productCodes
    ): void
    {
        $products = $this->productRepository->findBy(['code' => explode(',', $productCodes)]);

        foreach ($pictogram->getProducts() as $product) {
            $pictogram->removeProduct($product);
        }

        /** @var ProductInterface $product */
        foreach ($products as $product) {
            $pictogram->addProduct($product);
        }
    }

    /**
     * @param Collection|null $pictograms
     */
    private function setPictograms(?Collection $pictograms): void
    {
        $this->pictograms = $pictograms;
    }
}
