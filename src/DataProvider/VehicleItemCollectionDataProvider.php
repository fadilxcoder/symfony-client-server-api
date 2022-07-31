<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\ApiResources\Vehicle;
use App\Exceptions\CategoryFilterException;
use App\Exceptions\CategoryNotFoundException;
use App\Repository\VehiculesRepository;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class VehicleItemCollectionDataProvider implements ItemDataProviderInterface, ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    private $vehiculesRepository, $parameterBag;

    public function __construct(VehiculesRepository $vehiculesRepository, ParameterBagInterface $parameterBag)
    {
        $this->vehiculesRepository = $vehiculesRepository;
        $this->parameterBag = $parameterBag;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Vehicle::class === $resourceClass;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        if ($this->vehiculesRepository->findById($id)) {
            $result = $this->vehiculesRepository->findById($id);
            $imageConf = $this->parameterBag->get('vehicle_image_url');
            $imageFullPath = str_replace('{name}', $result['image_name'], $imageConf);

            return new Vehicle(
                $result['id'],
                $result['vehicle_name'],
                $imageFullPath,
                $result['price'],
                $result['transmission']
            );
        }

        return null;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        if (empty($context['filters']) && empty($context['filters']['category'])) {
            throw new CategoryFilterException('Category parameter is not provided !');
        }

        if (false === isset($this->parameterBag->get('vehicles_type')[$context['filters']['category']])) {
            throw new CategoryNotFoundException('Category value is not valid !');
        }

        $response = [];
        $results = $this->vehiculesRepository->findByCategoryId($this->parameterBag->get('vehicles_type')[$context['filters']['category']]);
        foreach ($results as $result) {
            $imageConf = $this->parameterBag->get('vehicle_image_url');
            $imageFullPath = str_replace('{name}', $result['image_name'], $imageConf);

            $response[] = new Vehicle(
                $result['id'],
                $result['vehicle_name'],
                $imageFullPath,
                $result['price'],
                $result['transmission']
            );
        }

        return $response;
    }
}
