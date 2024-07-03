<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait;
use Core\Domain\ValueObject\Uuid;
use DateTime;

class Account
{
    use MethodsMagicsTrait;

    public function __construct(
        protected string $client,
        protected Uuid|string $id = '',
        protected ?DateTime $createdAt = null,
    ) {
        $this->id = $this->id ?? Uuid::random();
        $this->createdAt = $this->createdAt ?? new DateTime();
    }
}
