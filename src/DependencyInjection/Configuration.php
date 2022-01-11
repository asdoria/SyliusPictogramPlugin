<?php
declare(strict_types=1);

namespace Asdoria\SyliusPictogramPlugin\DependencyInjection;

use Asdoria\Bundle\FacetFilterBundle\Entity\MatrixFacetGroupTranslation;
use Asdoria\Bundle\FacetFilterBundle\Form\Type\MatrixFacetGroupTranslationType;
use Asdoria\SyliusPictogramPlugin\Controller\PictogramController;
use Asdoria\SyliusPictogramPlugin\Entity\Pictogram;
use Asdoria\SyliusPictogramPlugin\Entity\PictogramGroup;
use Asdoria\SyliusPictogramPlugin\Entity\PictogramGroupTranslation;
use Asdoria\SyliusPictogramPlugin\Entity\PictogramImage;
use Asdoria\SyliusPictogramPlugin\Entity\PictogramTranslation;
use Asdoria\SyliusPictogramPlugin\Factory\PictogramFactory;
use Asdoria\SyliusPictogramPlugin\Form\Type\PictogramGroupTranslationType;
use Asdoria\SyliusPictogramPlugin\Form\Type\PictogramGroupType;
use Asdoria\SyliusPictogramPlugin\Form\Type\PictogramImageType;
use Asdoria\SyliusPictogramPlugin\Form\Type\PictogramTranslationType;
use Asdoria\SyliusPictogramPlugin\Form\Type\PictogramType;
use Asdoria\SyliusPictogramPlugin\Repository\PictogramGroupRepository;
use Asdoria\SyliusPictogramPlugin\Repository\PictogramRepository;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Component\Resource\Factory\Factory;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Asdoria\SyliusPictogramPlugin\DependencyInjection
 *
 * @author  Hugo Duval <hugo.duval@asdoria.com>
 */
class Configuration  implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('asdoria_sylius_pictogram_plugin');
//        $rootNode    = $treeBuilder->getRootNode();
        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('driver')->defaultValue(SyliusResourceBundle::DRIVER_DOCTRINE_ORM)->end()
            ->end();
        $this->addResourcesSection($rootNode);

        return $treeBuilder;
    }


    private function addResourcesSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->arrayNode('resources')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('pictogram_group')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(PictogramGroup::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->defaultValue(PictogramGroupRepository::class)->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->scalarNode('form')->defaultValue(PictogramGroupType::class)->cannotBeEmpty()->end()
                                    ->end()
                                ->end()
                                ->arrayNode('translation')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                    ->variableNode('options')->end()
                                        ->arrayNode('classes')
                                            ->addDefaultsIfNotSet()
                                            ->children()
                                                ->scalarNode('model')->defaultValue(PictogramGroupTranslation::class)->cannotBeEmpty()->end()
                                                ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                                ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                                ->scalarNode('form')->defaultValue(PictogramGroupTranslationType::class)->cannotBeEmpty()->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('pictogram')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(Pictogram::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(PictogramController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->defaultValue(PictogramRepository::class)->end()
                                        ->scalarNode('factory')->defaultValue(PictogramFactory::class)->end()
                                        ->scalarNode('form')->defaultValue(PictogramType::class)->cannotBeEmpty()->end()
                                    ->end()
                                ->end()
                                ->arrayNode('translation')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                    ->variableNode('options')->end()
                                        ->arrayNode('classes')
                                            ->addDefaultsIfNotSet()
                                            ->children()
                                                ->scalarNode('model')->defaultValue(PictogramTranslation::class)->cannotBeEmpty()->end()
                                                ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                                ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                                ->scalarNode('form')->defaultValue(PictogramTranslationType::class)->cannotBeEmpty()->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('pictogram_image')
                            ->addDefaultsIfNotSet()
                            ->children()
                            ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(PictogramImage::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->scalarNode('form')->defaultValue(PictogramImageType::class)->cannotBeEmpty()->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                ->end()
            ->end();
    }

}
