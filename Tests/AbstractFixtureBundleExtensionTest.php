<?php
namespace Gos\Bundle\FixtureBundle\Tests;

use Gos\Bundle\FixtureBundle\DependencyInjection\GosFixtureExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

abstract class AbstractFixtureBundleExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GosFixtureExtension
     */
    private $extension;

    /**
     * @var ContainerBuilder
     */
    private $container;

    protected function setUp()
    {
        parent::setUp();
        $this->extension = new GosFixtureExtension();
        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);
    }

    abstract protected function loadConfiguration(ContainerBuilder $container, $resource);

    protected function compileWithConfig($file)
    {
        $this->loadConfiguration($this->container, $file);
        $this->container->compile();
    }

    protected function compileWithoutConfig()
    {
        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();
    }

    public function testServiceParametersWithGoodConfiguration()
    {
        $this->compileWithoutConfig('good_configuration');
        $this->assertNotEquals(array('foo/bar'), $this->container->getParameter('gos_fixture_directories'));
    }

    public function testServiceWithoutConfig()
    {
        $this->compileWithConfig('good_configuration');
        $this->assertInstanceOf('Gos\Component\Fixture\Fixture', $this->container->get('gos.fixture_bundle.fixture'));
    }

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testServiceWithBadConfig()
    {
        $this->compileWithConfig('dummy_configuration');
    }

    public function testServiceWithGoodConfig()
    {
        $this->compileWithConfig('good_configuration');
        $this->assertInstanceOf('Gos\Component\Fixture\Fixture', $this->container->get('gos.fixture_bundle.fixture'));
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->extension = null;
        $this->container = null;
    }
}
