<?php

namespace App\Controller;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RandomUserController extends AbstractController
{
    public function __invoke(int $id, HttpClientInterface $client)
    {
        try {
            $response = $client->request(
                'GET',
                'https://reqres.in/api/users/' . $id
            );
            $content = $response->getContent();
            $content = $response->toArray();
            $content = $content['data'];

            return $this->json([
                'response' => [
                    'email' => $content['email'],
                    'first_name' => $content['first_name'],
                    'last_name' => $content['last_name'],
                ],
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'error' => $e->getMessage()
            ]);
        }
    }

}