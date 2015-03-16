<?php

namespace Idrolab\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Idrolab\JobeetBundle\Entity\Job;

class LoadJobData extends AbstractFixture implements FixtureInterface,OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $job = new Job();
        $job->setCategory($this->getReference('programming'));
        $job->setType('full-time');
        $job->setCompany('Sensio Labs');
        $job->setLogo('http://www.pearsonvue.com/pvueImages/clients/sensiolabs/sensiolabs_logo.gif');
        $job->setUrl('http://www.sensiolabs.com/');
        $job->setPosition('Web Developer');
        $job->setLocation('Paris, France');
        $job->setDescription('You\'ve already developed websites with symfony and you want to work
      with Open-Source technologies. You have a minimum of 3 years
      experience in web development with PHP or Java and you wish to
      participate to development of Web 2.0 sites using the best
      frameworks available.');
        $job->setHowToApply('Send your resume to fabien.potencier [at] sensio.com');
        $job->setIsPublic(true);
        $job->setIsActivated(true);
        $job->setToken('job_sensio_labs');
        $job->setEmail('job@example.com');
        $job->setExpiresAt(new \DateTime('2015-06-01'));
        $manager->persist($job);
# data/fixtures/jobs.yml
//JobeetJob:
//  job_sensio_labs:
//    JobeetCategory: programming
//    type:         full-time
//    company:      Sensio Labs
//    logo:         /uploads/jobs/sensio_labs.png
//    url:          http://www.sensiolabs.com/
//    position:     Web Developer
//    location:     Paris, France
//    description:  |
//      You've already developed websites with symfony and you want to work
//      with Open-Source technologies. You have a minimum of 3 years
//      experience in web development with PHP or Java and you wish to
//      participate to development of Web 2.0 sites using the best
//      frameworks available.
//    how_to_apply: |
//      Send your resume to fabien.potencier [at] sensio.com
//    is_public:    true
//    is_activated: true
//    token:        job_sensio_labs
//    email:        job@example.com
//    expires_at:   '2008-10-10'

        $manager->flush();
    }

    public function getOrder(){
      return 20;
    }
}