<?php

namespace Idrolab\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Idrolab\JobeetBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
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
        $this->addReference('design', $category);

        $category = new Category();
        $category->setName('Programming');
        $manager->persist($category);
        $this->addReference('programming', $category);

        $category = new Category();
        $category->setName('Manager');
        $manager->persist($category);
        $this->addReference('manager', $category);

        $category = new Category();
        $category->setName('Administrator');
        $manager->persist($category);
        $this->addReference('administrator', $category);

        $manager->flush();
    }
    public function getOrder(){
      return 10;
    }
}