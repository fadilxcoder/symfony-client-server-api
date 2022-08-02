<?php

namespace App\Tests\Unit\Logic;

use App\Services\ElasticSearch;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ElasticSearchTest extends TestCase
{
    private $data;

    private $connection;

    protected function setUp(): void
    {
        $this->data = [
            'email_valid' => 'hauck.mara@fay.com',
            'email_invalid' => 'joe@xyz.co.za',
        ];

        $this->connection = $_ENV['ESX_CONNECTION'];
    }

    public function testItReturnData()
    {
        $esx = new ElasticSearch($this->connection);
        $response = $esx->search($this->data['email_valid']);
        $this->assertIsArray($response);
        $this->assertEquals($this->data['email_valid'], $response['email']);
    }

    public function testItNotFound()
    {
        $esx = new ElasticSearch($this->connection);
        $this->expectException(NotFoundHttpException::class);
        $this->expectExceptionMessage('No result found !');
        $esx->search($this->data['email_invalid']);
    }

    protected function tearDown(): void
    {
        $this->data = null;
    }
}