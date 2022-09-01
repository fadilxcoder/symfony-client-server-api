<?php

namespace App\Tests\EndToEnd\Esx;

use App\Tests\EndToEnd\Auth\TokenTest;

class ElasticsearchTest extends TokenTest
{
    /**
     * @depends testAuthClientSuccess
     */
    public function testEsxSearchSuccess(string $token): void
    {
        $this->client->request(
            'GET',
            '/api/esx-user',
            [
                'email' => 'emuller@collins.com',
            ],
            [],
            [
                'HTTP_CLIENT-TOKEN' => $token,
                'HTTP_ACCEPT' => 'application/json',
            ]
        );

        $this->assertResponseIsSuccessful();
        $this->assertJson($this->client->getResponse()->getContent());
        $responseDatas = json_decode($this->client->getResponse()->getContent(), true);
        $this->assertDemandResponse($responseDatas[0]);
    }

    private function assertDemandResponse($element)
    {
        $this->assertArrayHasKey('id', $element);
        $this->assertArrayHasKey('name', $element);
        $this->assertArrayHasKey('email', $element);
        $this->assertArrayHasKey('address', $element);
        $this->assertArrayHasKey('description', $element);
    }
}
