<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Account;
use Core\Domain\ValueObject\Uuid;
use Exception;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    public function testAccountWithNameOnly()
    {
        $account = new Account(client: 'John Doe');
        $this->assertEquals('John Doe', $account->client);
        $this->assertNotNull($account->id());
        $this->assertNotNull($account->createdAt());
    }

    public function testAccountWithId()
    {
        $uuid = Uuid::random();
        $account = new Account(id: $uuid, client: 'John Doe');
        $this->assertEquals('John Doe', $account->client);
        $this->assertEquals($uuid, $account->id());
    }

    public function testExceptionWithPropertyInvalid()
    {
        $this->expectException(Exception::class);
        $account = new Account(client: 'John Doe');
        $account->name;
    }
}
