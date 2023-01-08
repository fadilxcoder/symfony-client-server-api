<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\Vehicle;
use App\Exceptions\CategoryFilterException;
use App\Exceptions\CategoryNotFoundException;
use App\Repository\VehiculesRepository;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class VehicleItemCollectionDataProvider implements ProviderInterface
{
    private $vehiculesRepository;
    private $parameterBag;

    public function __construct(VehiculesRepository $vehiculesRepository, ParameterBagInterface $parameterBag)
    {
        $this->vehiculesRepository = $vehiculesRepository;
        $this->parameterBag = $parameterBag;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if ($operation instanceof CollectionOperationInterface) {
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

        $id = $uriVariables['id'];
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
}
