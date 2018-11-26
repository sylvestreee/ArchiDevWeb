<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/models"), $isDevMode);

$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'OneGameOneLife'
);

$entityManager = EntityManager::create($conn, $config);