<?php

namespace Idrolab\JobeetBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;
class JobControllerTest extends WebTestCase
{
    public function testIndex()
    {
      $executor = $this->loadFixtures(array(
      'Idrolab\JobeetBundle\DataFixtures\ORM\LoadCategoryData',
      'Idrolab\JobeetBundle\DataFixtures\ORM\LoadJobData',
      ));

      $client = static::createClient();
      $client->followRedirects(true);

      $crawler = $client->request('GET', '/');
      $this->assertEquals(200, $client->getResponse()->getStatusCode());

      $this->assertCount(1,$crawler->filter('div#jobs'));
      $this->assertCount(1, $crawler->filter('div.category:contains("Programming")'));

      $crawler = $client->click($crawler->selectLink('Web Developer')->link());

      $this->assertEquals(200, $client->getResponse()->getStatusCode());

      $this->assertCount(1,$crawler->filter('p.how_to_apply'));
    }
    /*
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/job/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /job/");
        $crawler = $client->click($crawler->selectLink('Create a new entry')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'idrolab_jobeetbundle_job[field_name]'  => 'Test',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Update')->form(array(
            'idrolab_jobeetbundle_job[field_name]'  => 'Foo',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());
    }

    */
}
