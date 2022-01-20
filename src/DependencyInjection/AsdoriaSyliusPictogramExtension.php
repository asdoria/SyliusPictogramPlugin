<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\DependencyInjection;

use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Sylius\Bundle\CoreBundle\DependencyInjection\PrependDoctrineMigrationsTrait;

/**
 * Class AsdoriaSyliusPictogramExtension
 * @package Asdoria\SyliusPictogramPlugin\DependencyInjection
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
class AsdoriaSyliusPictogramExtension extends AbstractResourceExtension implements PrependExtensionInterface
{
    use PrependDoctrineMigrationsTrait;

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $configs);
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $this->registerResources('asdoria', $config['driver'], $config['resources'], $container);

        $loader->load('services.yaml');

    }

    /**
     * {@inheritdoc}
     */
    public function prepend(ContainerBuilder $container): void
    {
        $this->prependDoctrineMigrations($container);
    }

    /**
     * {@inheritdoc}
     */
    protected function getMigrationsNamespace(): string
    {
        return 'Asdoria\SyliusPictogramPlugin\Migrations';
    }

    /**
     * {@inheritdoc}
     */
    protected function getMigrationsDirectory(): string
    {
        return '@AsdoriaSyliusPictogramPlugin/Migrations';
    }

    /**
     * {@inheritdoc}
     */
    protected function getNamespacesOfMigrationsExecutedBefore(): array
    {
        return ['Sylius\Bundle\CoreBundle\Migrations'];
    }
}
