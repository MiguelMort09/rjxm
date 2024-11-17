<?php

namespace App\Enums;

enum TypeCall: int
{
    case CALL_GENERAL_PUBLIC = 1;
    case CALL_PRIVATE_PUBLIC = 2;
    case CALL_SUBSCRIPT = 3;
}
