<?php

namespace Dizda\CloudBackupBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dizda_cloud_backup');

        $rootNode
        ->children()
            ->scalarNode('output_file_prefix')->defaultValue(gethostname())->end()
            ->scalarNode('timeout')->defaultValue(300)->end()
            ->arrayNode('processor')
                ->addDefaultsIfNotSet()
                ->children()
                    ->enumNode('type')->values(array('tar', 'zip', '7z'))->defaultValue('tar')->end()
                    ->scalarNode('date_format')->defaultValue('Y-m-d_H-i-s')->end()
                    ->arrayNode('options')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('password')->defaultNull()->end()
                            ->integerNode('compression_ratio')->defaultValue(6)->min(0)->max(100)->end()
                            ->arrayNode('split')
                                ->addDefaultsIfNotSet()
                                ->children()
                                    ->booleanNode('enable')->defaultFalse()->end()
                                    ->integerNode('split_size')->isRequired()->defaultNull()->end()
                                    ->arrayNode('storages')->prototype('scalar')->end()->isRequired()->requiresAtLeastOneElement()->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
            ->arrayNode('folders')->prototype('scalar')->end()->end()
            ->arrayNode('cloud_storages')
                ->children()
                    ->arrayNode('dropbox')
                    ->info('Dropbox account credentials (use parameters in config.yml and store real values in prameters.yml)')
                        ->children()
                            ->scalarNode('user')->isRequired()->end()
                            ->scalarNode('password')->isRequired()->end()
                            ->scalarNode('remote_path')->defaultValue('/')->end()
                        ->end()
                    ->end()
                    ->arrayNode('local')
                    ->info('Local storage definition')
                        ->children()
                            ->scalarNode('path')->isRequired()->end()
                        ->end()
                    ->end()
                    ->arrayNode('dropbox_sdk')
                    ->info('Dropbox using official dropbox sdk API')
                        ->children()
                            ->scalarNode('access_token')->isRequired()->end()
                            ->scalarNode('remote_path')->isRequired()->end()
                        ->end()
                    ->end()
                    ->arrayNode('google_drive')
                    ->info('Google Drive token name as specified in the Happyr Google Site Authenticator Bundle')
                        ->children()
                            ->scalarNode('token_name')->isRequired()->end()
                            ->scalarNode('remote_path')->defaultValue('/')->end()
                        ->end()
                    ->end()
                    ->arrayNode('cloudapp')
                    ->info('CloudApp')
                        ->children()
                            ->scalarNode('user')->isRequired()->end()
                            ->scalarNode('password')->isRequired()->end()
                        ->end()
                    ->end()
                    ->arrayNode('gaufrette')
                    ->info('Any gaufrette adapter is supported')
                        ->children()
                            ->arrayNode('service_name')->prototype('scalar')->end()->isRequired()->requiresAtLeastOneElement()->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
            ->arrayNode('databases')
                ->children()
                    ->arrayNode('mongodb')
                        ->children()
                            ->booleanNode('all_databases')->defaultTrue()->end()
                            ->scalarNode('database')->defaultNull()->end()
                            ->scalarNode('db_host')->defaultValue('localhost')->end()
                            ->scalarNode('db_port')->defaultValue(27017)->end()
                            ->scalarNode('db_user')->defaultValue(null)->end()
                            ->scalarNode('db_password')->defaultValue(null)->end()
                        ->end()
                    ->end()
                    ->arrayNode('mysql')
                        ->children()
                            ->booleanNode('all_databases')->defaultFalse()->end()
                            ->scalarNode('database')->defaultNull()->end()
                            ->scalarNode('db_host')->defaultNull()->end()
                            //->scalarNode('db_host')->defaultValue('localhost')->end()
                            ->scalarNode('db_port')->defaultValue(3306)->end()
                            ->scalarNode('db_user')->defaultNull()->end()
                            ->scalarNode('db_password')->defaultNull()->end()
                            ->arrayNode('ignore_tables')
                                ->prototype('scalar')->end()
                            ->end()
                        ->end()
                    ->end()
                    ->arrayNode('postgresql')
                        ->children()
                            ->scalarNode('database')->defaultNull()->end()
                            ->scalarNode('db_host')->defaultValue('localhost')->end()
                            ->scalarNode('db_port')->defaultValue(5432)->end()
                            ->scalarNode('db_user')->defaultNull()->end()
                            ->scalarNode('db_password')->defaultNull()->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}