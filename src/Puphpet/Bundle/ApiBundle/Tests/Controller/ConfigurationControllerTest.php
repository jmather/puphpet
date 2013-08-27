<?php

namespace Puphpet\Bundle\ApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group functional
 */
class ConfigurationControllerTest extends WebTestCase
{
    public function testValidateCorrectConfiguration()
    {
        $client = static::createClient();

        $crawler = $client->request(
            'POST',
            '/api/configuration/validate',
            array(), // parameters
            array(), // files
            array(), //server
            json_encode(['configuration' => ['server' => ['packages' => []]]])
        );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $decoded = $this->parseResult($client);
        $this->assertInternalType('array', $decoded);
        $this->assertArrayHasKey('result', $decoded);
        $this->assertTrue($decoded['result']);
    }

    public function testInvalideConfiguration()
    {
        $client = static::createClient();

        $crawler = $client->request(
            'POST',
            '/api/configuration/validate',
            array(), // parameters
            array(), // files
            array(), //server
            json_encode(['configuration' => ['unknown' => ['packages' => []]]])
        );

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testIncompleteConfiguration()
    {
        $client = static::createClient();

        $crawler = $client->request(
            'POST',
            '/api/configuration/validate',
            array(), // parameters
            array(), // files
            array(), //server
            json_encode([])
        );

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    private function parseResult(Client $client)
    {
        return json_decode($client->getResponse()->getContent(), true);
    }
}
