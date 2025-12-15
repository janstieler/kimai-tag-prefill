<?php
namespace KimaiPlugin\TagPrefillBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('tag_prefill');
        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->booleanNode('enabled')
                    ->defaultTrue()
                ->end()
                ->arrayNode('mappings')
                    ->arrayPrototype()
                        ->children()
                            ->scalarNode('activity_id')->end()
                            ->scalarNode('tag')->end()
                        ->end()
                    ->end()
                ->end()
                ->booleanNode('auto_apply')
                    ->defaultTrue()
                    ->info('Tags automatisch setzen ohne User-Interaktion')
                ->end()
                ->integerNode('delay_ms')
                    ->defaultValue(200)
                    ->info('Verzögerung in Millisekunden')
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}