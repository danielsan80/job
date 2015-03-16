<?php

namespace Idrolab\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Idrolab\JobeetBundle\Entity\Category;

class LoadCategoryData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('Design');
        $category->setCreatedAt(new \DateTime('2010-01-01'));
        $manager->persist($category);

        $category = new Category();
        $category->setName('Programming');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Manager');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Administrator');
        $manager->persist($category);

        $manager->flush();
    }
}