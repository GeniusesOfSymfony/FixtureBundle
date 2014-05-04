<?php
namespace Gos\Bundle\FixtureBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('gos_fixture');

        $rootNode->children()
            ->arrayNode('directories')
                ->requiresAtLeastOneElement()
                ->prototype('scalar')
            ->end()
        ->end();

        return $treeBuilder;
    }
}
