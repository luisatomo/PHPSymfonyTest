<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Finder\Finder;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class EntityData
 * @package AppBundle\DataFixtures\ORM
 */
class EntityData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $files = Finder::create()->in(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'SQL')->name('*.sql');
        $em             = $this->container->get('doctrine.orm.entity_manager');
        $connection     = $em->getConnection();

        foreach ($files as $file) {
            $content    = $file->getContents();
            $stmt       = $connection->prepare($content);
            $stmt->execute();
        }
    }

    public function getOrder()
    {
        return 0;
    }
}