<?php

namespace DormTest\Controller;


use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Dorm\Controller\DormController;

class DormControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;

    public function setUp() 
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            // Grabbing the full application configuration:
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));
        
        parent::setUp();
        include( __DIR__ . '/../../Resources/generated-conf/config.php');
        

    }


    public function testUsersActionCanBeAccessed()
    {
        
        $this->dispatch('/api/dorm/users');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Dorm');
        $this->assertControllerName(DormController::class);
        $this->assertControllerClass('DormController');
        $this->assertMatchedRouteName('dorm');
    }

    public function testUnitsActionCanBeAccessed()
    {
        
        $this->dispatch('/api/dorm/units');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Dorm');
        $this->assertControllerName(DormController::class);
        $this->assertControllerClass('DormController');
        $this->assertMatchedRouteName('dorm');
    }

}