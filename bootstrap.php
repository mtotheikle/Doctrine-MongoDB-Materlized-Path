<?php
require 'vendor/doctrine-common/lib/Doctrine/Common/ClassLoader.php';

use Doctrine\Common\ClassLoader;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;


// ODM Classes
$classLoader = new ClassLoader('Doctrine\ODM\MongoDB', 'vendor/doctrine-mongodb-odm/lib');
$classLoader->register();

// Common Classes
$classLoader = new ClassLoader('Doctrine\Common', 'vendor/doctrine-common/lib');
$classLoader->register();

// MongoDB Classes
$classLoader = new ClassLoader('Doctrine\MongoDB', 'vendor/doctrine-mongodb/lib');
$classLoader->register();

// Document classes
$classLoader = new ClassLoader('Documents', __DIR__);
$classLoader->register();

// Gedmo Doctrine Extension classes
$classLoader = new \Doctrine\Common\ClassLoader('Gedmo', __DIR__ . '/../doctrine-extensions/lib');
$classLoader->register();

$config = new Configuration();
$config->setProxyDir(__DIR__ . '/cache');
$config->setProxyNamespace('Proxies');

$config->setHydratorDir(__DIR__ . '/cache');
$config->setHydratorNamespace('Hydrators');

$reader = new AnnotationReader();
$reader->setDefaultAnnotationNamespace('Doctrine\ODM\MongoDB\Mapping\\');
$config->setMetadataDriverImpl(new AnnotationDriver($reader, __DIR__ . '/Documents'));

$evm = new \Doctrine\Common\EventManager();
$treeListener = new \Gedmo\Tree\TreeListener();
$evm->addEventSubscriber($treeListener);
    
$dm = DocumentManager::create(new Connection(), 'materialized_path_example', $config, $evm);
