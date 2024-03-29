<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\Pagination;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\CachedData;
use App\Exceptions\EmptyCacheException;
use Faker;
use JsonException;
use Redis;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class RedisUserCollectionDataProvider implements ProviderInterface
{
    private $redis;

    private $faker;

    private $serializer;

    private const KEY = 'api:app:users';

    public function __construct(Redis $redis, SerializerInterface $serializer)
    {
        $this->redis = $redis;
        $this->serializer = $serializer;
        $this->faker = Faker\Factory::create();
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $this->redis->select(2);
        $datas = $this->redis->get(self::KEY);
//        dd($datas);
        if (!$datas) {
            $jsonContent = null;
            for ($i = 0; $i < 10; ++$i) {
                $user[$i] = new CachedData(
                    $this->faker->unique()->randomDigit(),
                    $this->faker->name(),
                    $this->faker->email()
                );
            }
            $jsonContent = $this->serializer->serialize($user, 'json');
            $this->redis->set(self::KEY, $jsonContent);
            throw new EmptyCacheException(Response::HTTP_I_AM_A_TEAPOT, 'Cache was being populated, please retry !');
        }

        $response = [];

        try {
            $datas = json_decode($datas, true, 512, JSON_THROW_ON_ERROR);
            foreach ($datas as $data) {
                $response[] = new CachedData(
                    $data['id'],
                    $data['name'],
                    $data['email']
                );
            }
            return $response;
        } catch (JsonException $e) {
            throw new JsonException($e->getMessage());
        }
    }
}
