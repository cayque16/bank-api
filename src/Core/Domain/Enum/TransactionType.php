<?php

namespace Core\Domain\Enum;

enum TransactionType: int
{
    case DEPOSIT = 1;
    case WITHDRAW = 2;
}
