<?php
namespace Idrolab\JobeetBundle\Tests\Entity;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Idrolab\JobeetBundle\Entity\Job;

class JobTest extends WebTestCase
{

  public function testSetCategory()
  {

    $executor = $this->loadFixtures(array(
    'Idrolab\JobeetBundle\DataFixtures\ORM\LoadCategoryData',
    ));

    $job = new Job();

    $referenceRepository = $executor->getReferenceRepository();
    $category = $referenceRepository->getReference('programming');

    $job->setCategory($category);

    $job->setPosition('Web Developer');

    $this->assertCount(1, $category->getJobs());
    $this->assertEquals('Web Developer', $category->getJobs()->first()->getPosition());

    $job->setCategory($category);

    $job->setPosition('Web Developer');

    $this->assertCount(1, $category->getJobs());
    $this->assertEquals('Web Developer', $category->getJobs()->first()->getPosition());

    $job->setCategory(null);

    $this->assertCount(0, $category->getJobs());
  }
}