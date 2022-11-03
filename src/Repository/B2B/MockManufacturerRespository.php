<?php

namespace App\Repository\B2B;

class MockManufacturerRespository implements ManufacturerRespositoryInterface
{
    private $data = [
        [
            'id' => 123456,
            'name' => 'B2B BOXOP WP',
            'domain' => 'http://b2b.boxop.wp.local/',
            'product_url' => 'http://b2b.boxop.wp.local/wp-json/wc/v3/products/',
            'order_url' => 'http://b2b.boxop.wp.local/wp-json/wc/v3/orders/',
            'offline' => true,
        ],
    ];

    public function getInfo(int $id): ?array
    {
        foreach ($this->data as $item) {
            if ($item['id'] === $id) {
                return [
                    'product_url' => $item['product_url'],
                    'order_url' => $item['order_url'],
                    'name' => $item['name'],
                    'offline' => $item['offline'],
                ];
            }
        }

        return null;
    }
}
