<?php

use Propel\Common\Config\ConfigurationManager;
use Propel\Runtime\Connection\ConnectionManagerSingle;
use Propel\Runtime\Propel;

// Load the configuration file 
$configManager = new ConfigurationManager( './Resources/propel.xml' );

// Set up the connection manager
$manager = new ConnectionManagerSingle();
$manager->setConfiguration( $configManager->getConnectionParametersArray()[ 'itsgenius_zend' ] );
$manager->setName('itsgenius_zend');

// Add the connection manager to the service container
$serviceContainer = Propel::getServiceContainer();
$serviceContainer->setAdapterClass('itsgenius_zend', 'mysql');
$serviceContainer->setConnectionManager('itsgenius_zend', $manager);
$serviceContainer->setDefaultDatasource('itsgenius_zend');