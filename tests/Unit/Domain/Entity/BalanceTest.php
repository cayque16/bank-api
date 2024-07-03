<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Balance;
use Core\Domain\Enum\Currency;
use Core\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;

class BalanceTest extends TestCase
{
    public function testConstruct()
    {
        $balance = new Balance(
            accountId: Uuid::random(),
            currency: Currency::BRL,
            value: 150.50
        );

        $this->assertNotNull($balance->id());
        $this->assertNotNull($balance->createdAt());
        $this->assertNull($balance->updatedAt());
    }

    public function testUpdate()
    {
        $balance = new Balance(
            accountId: Uuid::random(),
            currency: Currency::BRL,
            value: 150.50
        );

        $balance->update(value: 200.00);

        $this->assertEquals(200.00, $balance->value);
        $this->assertNotNull($balance->updatedAt());
    }
}
