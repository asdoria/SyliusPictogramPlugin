<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\Twig;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class PictogramExtension
 * @package App\Twig
 */
class PictogramExtension extends AbstractExtension
{
    /**
     * @var RepositoryInterface
     */
    protected RepositoryInterface $pictogramRepository;

    /**
     * PictogramExtension constructor.
     *
     * @param RepositoryInterface $pictogramRepository
     */
    public function __construct(RepositoryInterface $pictogramRepository)
    {
        $this->pictogramRepository = $pictogramRepository;
    }

    /**
     * @return array
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('getPictogramForId', [$this->pictogramRepository, 'find']),
        ];
    }
}
