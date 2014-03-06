<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../../vendor/autoload.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

$loader->addPsr4('Engage360d\\Bundle\\SearchTestBundle\\', __DIR__ . '/../Fixtures');

return $loader;
