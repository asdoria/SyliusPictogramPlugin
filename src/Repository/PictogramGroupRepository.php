<?php

declare(strict_types=1);


namespace Asdoria\SyliusPictogramPlugin\Repository;


use Asdoria\SyliusPictogramPlugin\Repository\Model\PictogramGroupRepositoryInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * Class PictogramGroupRepository
 * @package Asdoria\SyliusPictogramPlugin\Repository
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
class PictogramGroupRepository  extends EntityRepository implements PictogramGroupRepositoryInterface
{

}
