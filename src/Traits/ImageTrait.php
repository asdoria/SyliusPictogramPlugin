<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Traits;


use Sylius\Component\Core\Model\ImageInterface;

/**
 * Trait ImageTrait
 * @package App\Traits
 */
trait ImageTrait
{
    /**
     * @var ImageInterface|null
     */
    protected $image;

    /**
     * @return ImageInterface|null
     */
    public function getImage(): ?ImageInterface
    {
        return $this->image;
    }

    /**
     * @param ImageInterface|null $image
     */
    public function setImage(?ImageInterface $image): void
    {
        $image->setOwner($this);
        $this->image = $image;
    }
}
