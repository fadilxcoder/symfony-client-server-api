<?php

namespace App\Repository\B2B;

class MockManufacturerRespository implements ManufacturerRespositoryInterface
{
    private $data = [
        [
            'id' => 1,
            'uuid' => '9abd245f-7c47-4d8f-8544-b2e313361903',
            'name' => 'B2B BOXOP WP',
            'domain' => 'http://b2b.boxop.wp.local/',
            'product_url' => 'http://b2b.boxop.wp.local/wp-json/wc/v3/products/',
            'order_url' => 'http://b2b.boxop.wp.local/wp-json/wc/v3/orders/',
            'offline' => true,
        ],
    ];

    public function getInfo(string $idn): ?array
    {
        foreach ($this->data as $item) {
            if ($item['uuid'] === $idn) {
                return [
                    'id' => $item['id'],
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
