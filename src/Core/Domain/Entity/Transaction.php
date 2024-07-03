<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait;
use Core\Domain\Enum\Currency;
use Core\Domain\Enum\TransactionType;
use Core\Domain\ValueObject\Uuid;
use DateTime;

class Transaction
{
    use MethodsMagicsTrait;
    
    public function __construct(
        protected Uuid $accountId,
        protected float $amount,
        protected Currency $currency,
        protected TransactionType $type,
        protected Uuid|string $id = '',
        protected ?DateTime $createdAt = null,
    ) {
        $this->id = $this->id ?: Uuid::random();
        $this->createdAt = $this->createdAt ?? new DateTime();
    }

    public function execute(float $balance): float
    {
        if ($this->type == TransactionType::WITHDRAW) {
            return $balance - $this->amount;
        }
        return $balance + $this->amount;
    }
}
