<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Repository\Model;

use Doctrine\ORM\QueryBuilder;
use Sylius\Component\Resource\Repository\RepositoryInterface;

/**
 * Interface PictogramRepositoryInterface
 * @package Asdoria\SyliusPictogramPlugin\Repository\Model
 */
interface PictogramRepositoryInterface extends RepositoryInterface
{
    /**
     * @param string $pictogramGroupId
     *
     * @return QueryBuilder
     */
    public function createListQueryBuilder(string $pictogramGroupId): QueryBuilder;

    /**
     * @param string $phrase
     * @param string $locale
     *
     * @return array
     */
    public function findByPhrase(string $phrase, string $locale): array;

    /**
     * @param string $locale
     * @param        $pictogramGroupId
     *
     * @return QueryBuilder
     */
    public function createQueryBuilderByProductId(string $locale, $pictogramGroupId): QueryBuilder;
}
