<?php

namespace App\Enums;

enum StatusCall: int
{
    case DRAFT = 1;
    case ACTIVE = 2;
    case CLOSED = 3;
    case FINALIZED = 4;
    case CANCELLED = 5;
    case COMPLETED = 6;
}
