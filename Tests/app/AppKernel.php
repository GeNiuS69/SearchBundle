<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Nelmio\ApiDocBundle\NelmioApiDocBundle(),
            new FOS\ElasticaBundle\FOSElasticaBundle(),
            new Engage360d\Bundle\SearchBundle\Engage360dSearchBundle(),
        );

        return $bundles;
    }

    public function getCacheDir()
    {
        return realpath(__DIR__ . '/../..') . '/.tmp/cache';
    }

    public function getLogDir()
    {
        return realpath(__DIR__ . '/../..') . '/.tmp/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config.yml');
    }

    protected function getKernelParameters()
    {
        return array_merge(
            parent::getKernelParameters(),
            array(
                'kernel.vendor_dir' => realpath($this->rootDir . '/../../vendor'),
            )
        );
    }
}
