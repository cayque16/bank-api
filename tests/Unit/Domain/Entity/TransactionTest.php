<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Transaction;
use Core\Domain\Enum\Currency;
use Core\Domain\Enum\TransactionType;
use Core\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;

class TransactionTest extends TestCase
{
    public function testConstruct()
    {
        $transaction = new Transaction(
            accountId: Uuid::random(),
            amount: 100,
            currency: Currency::BRL,
            type: TransactionType::DEPOSIT
        );

        $this->assertNotEmpty($transaction->id());
    }

    /**
     * @dataProvider transactionsDataProvider
     */
    public function testMethodExecute($type, $amount, $balance, $result)
    {
        $transaction = new Transaction(
            accountId: Uuid::random(),
            amount: $amount,
            currency: Currency::BRL,
            type: $type
        );

        $this->assertEquals($result, $transaction->execute($balance));
    }

    public static function transactionsDataProvider()
    {
        return [
            [TransactionType::DEPOSIT, 100, 500, 600],
            [TransactionType::WITHDRAW, 100, 500, 400],
        ];
    }
}
