<?php
namespace KimaiPlugin\TagPrefillBundle\DependencyInjection;

use App\Plugin\AbstractPluginExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TagPrefillExtension extends AbstractPluginExtension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        // Config als Container-Parameter speichern
        $container->setParameter('tag_prefill.config', $config);
        
        // Services laden
        $this->registerBundleConfiguration($container, $config);
        
        $loader = new \Symfony\Component\DependencyInjection\Loader\YamlFileLoader(
            $container,
            new \Symfony\Component\Config\FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.yaml');
    }
}