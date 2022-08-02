<?php

namespace App\Tests\Unit\Classes;

use App\ApiResources\EsxUser;
use PHPUnit\Framework\TestCase;

class EsxUserTest extends TestCase
{
    private $data;

    protected function setUp(): void
    {
        $this->data = [
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'johndoe@email.co.uk',
            'address' => '221B Baker Street, London',
            'description' => 'Escape the London bustle, step back in time, and enter a world of gas light, Victorian curiosities, and many of the objects, letters and characters from Sherlock Holmes’ most famous cases.',
        ];
    }

    public function testItValid()
    {
        $esx = new EsxUser(
            $this->data['id'],
            $this->data['name'],
            $this->data['email'],
            $this->data['address'],
            $this->data['description']
        );

        $this->assertEquals($this->data['id'], $esx->getId());
        $this->assertEquals($this->data['name'], $esx->getName());
        $this->assertEquals($this->data['email'], $esx->getEmail());
        $this->assertEquals($this->data['address'], $esx->getAddress());
        $this->assertEquals($this->data['description'], $esx->getDescription());
    }

    public function testItInvalid()
    {
        $this->expectError();
        $esx = new EsxUser(
            $this->data['id'],
            $this->data['name'],
            $this->data['email'],
            $this->data['address'],
            null
        );
    }

    protected function tearDown(): void
    {
        $this->data = null;
    }
}