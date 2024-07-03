<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait;
use Core\Domain\Enum\Currency;
use Core\Domain\ValueObject\Uuid;
use DateTime;

class Balance
{
    use MethodsMagicsTrait;

    public function __construct(
        protected Uuid $accountId,
        protected Currency $currency,
        protected float $value,
        protected Uuid|String $id = '',
        protected ?DateTime $createdAt = null,
        protected ?DateTime $updatedAt = null,
    ) {
        $this->id = $this->id ?? Uuid::random();
        $this->createdAt = $this->createdAt ?? new DateTime();
    }

    public function update(float $value): void
    {
        $this->value = $value;
        $this->updatedAt = new DateTime();
    }
}
