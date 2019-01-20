<?php
namespace ActivityPub\Test\Config;

use ActivityPub\Config\ActivityPubModule;
use ActivityPub\Http\ControllerResolver;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;

class ActivityPubModuleTest extends TestCase
{
    private $module;

    public function setUp()
    {
        $opts = array(
            'dbOptions' => array(
                'driver' => 'pdo_sqlite',
                'path' => ':memory:',
            ),
        );
        $this->module = new ActivityPubModule( $opts );
    }
    
    public function testItInjects()
    {
        $entityManager = $this->module->get( EntityManager::class );
        $this->assertNotNull( $entityManager );
        $this->assertInstanceOf( EntityManager::class, $entityManager );

        $controllerResolver = $this->module->get( ControllerResolver::class );
        $this->assertNotNull( $controllerResolver );
        $this->assertInstanceOf( ControllerResolver::class, $controllerResolver );

    }
}
?>