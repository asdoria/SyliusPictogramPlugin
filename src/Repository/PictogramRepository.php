<?php

declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Repository;

use Asdoria\SyliusPictogramPlugin\Repository\Model\PictogramRepositoryInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * Class PictogramRepository
 * @package Asdoria\SyliusPictogramPlugin\Repository
 */
class PictogramRepository extends EntityRepository implements PictogramRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createListQueryBuilder(string $pictogramGroupId): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->where('o.pictogramGroup = :pictogramGroupId')
            ->setParameter('pictogramGroupId', (int)$pictogramGroupId)
            ;
    }

    /**
     * @param string $phrase
     * @param string $locale
     *
     * @return array
     */
    public function findByPhrase(string $phrase, string $locale): array
    {
        return $this->createQueryBuilder('o')
            ->innerJoin('o.translations', 'translation', 'WITH', 'translation.locale = :locale')
            ->where('translation.name LIKE :phrase')
            ->setParameter('locale', $locale)
            ->setParameter('phrase', '%' . $phrase . '%')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param string $locale
     * @param        $pictogramGroupId
     *
     * @return QueryBuilder
     */
    public function createQueryBuilderByProductId(string $locale, $pictogramGroupId): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->innerJoin('o.translations', 'translation')
            ->andWhere('translation.locale = :locale')
            ->andWhere('o.pictogramGroup = :pictogramGroupId')
            ->setParameter('locale', $locale)
            ->setParameter('pictogramGroupId', $pictogramGroupId)
            ;
    }
}
