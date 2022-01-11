<?php

declare(strict_types=1);


namespace Asdoria\SyliusPictogramPlugin\Traits;

/**
 * Trait ResourceTrait
 * @package Asdoria\SyliusPictogramPlugin\Traits
 */
trait ResourceTrait
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
