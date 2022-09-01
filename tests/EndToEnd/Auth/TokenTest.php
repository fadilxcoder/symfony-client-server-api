<?php

namespace App\Tests\EndToEnd\Auth;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TokenTest extends WebTestCase
{
    protected $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testAuthClientSuccess(): string
    {
        $this->client->request(
            'POST',
            '/oauth-client',
            [],
            [],
            [],
            '{"client_id": "tester"}'
        );

        $this->assertResponseIsSuccessful();
        $this->assertJson($this->client->getResponse()->getContent());

        $responseDatas = json_decode($this->client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('token', $responseDatas);

        return $responseDatas['token'];
    }

    public function testAuthClientFail(): void
    {
        $this->client->request(
            'POST',
            '/oauth-client',
            [],
            [],
            [],
            '{"client_id": "t35T@r"}'
        );

        $this->assertResponseStatusCodeSame(401);
        $responseDatas = json_decode($this->client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('error', $responseDatas);
        $this->assertArrayHasKey('error_description', $responseDatas);
    }
}
