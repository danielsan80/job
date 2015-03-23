<?php

namespace Idrolab\JobeetBundle\Tests\Event\Listener;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class JobCreateListenerTest extends WebTestCase
{

    public function testEventTriggering()
    {
        $executor = $this->loadFixtures(array(
            'Idrolab\JobeetBundle\DataFixtures\ORM\LoadCategoryData',
            'Idrolab\JobeetBundle\DataFixtures\ORM\LoadJobData',
        ));
        
        $referenceRepository = $executor->getReferenceRepository();
        $category = $referenceRepository->getReference('programming');


        $client = static::createClient();
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/job/new');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertCount(1, $crawler->filter('form.new'));
        
        $expiresAt = new \DateTime('+1 month');
        
         $form = $crawler->selectButton('Create')->form(array(
            'idrolab_jobeetbundle_job[type]'  => 'full-time',
            'idrolab_jobeetbundle_job[company]'  => 'Idrolab',
            'idrolab_jobeetbundle_job[category]'  => $category->getId(),
            'idrolab_jobeetbundle_job[logo]'  => 'http://www.idrolab.net/images/scritta-idrolab.png',
            'idrolab_jobeetbundle_job[url]'  => 'http://www.idrolab.net/',
            'idrolab_jobeetbundle_job[position]'  => 'Web developer',
            'idrolab_jobeetbundle_job[location]'  => 'Cesena',
            'idrolab_jobeetbundle_job[description]'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut velit tristique, sollicitudin augue in, auctor eros. Cras faucibus nisi eu mi consectetur placerat.',
            'idrolab_jobeetbundle_job[howToApply]'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut velit tristique, sollicitudin augue in, auctor eros. Cras faucibus nisi eu mi consectetur placerat.',
            'idrolab_jobeetbundle_job[token]'  => 'aT0k3n',
            'idrolab_jobeetbundle_job[isPublic]'  => true,
            'idrolab_jobeetbundle_job[isActivated]'  => true,
            'idrolab_jobeetbundle_job[email]'  => 'mario@example.it',
            'idrolab_jobeetbundle_job[expiresAt]'  => $expiresAt->format('d/m/Y'),
        ));
         
        $client->submit($form);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $this->markTestIncomplete('This test should test JobCreatedListener has captured the launched JobEvent');
    }

}
