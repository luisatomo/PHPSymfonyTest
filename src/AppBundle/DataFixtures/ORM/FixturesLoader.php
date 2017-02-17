<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;
use Nelmio\Alice\Fixtures;
use Symfony\Component\Finder\Finder;

/**
 * Class FixturesLoader
 * @package AppBundle\DataFixtures\ORM
 */
class FixturesLoader extends AbstractLoader
{
    /**
     * {@inheritDoc}
     */
    public function getFixtures()
    {
        $files = Finder::create()->in(__DIR__)->name('*.yml');
        $paths = [];

        foreach ($files as $file) {
            $paths[] = $file->getRealPath();
        }

        return $paths;
    }
}