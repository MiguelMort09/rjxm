<?php

namespace App\Enums;

enum StatusPost: int
{
    case Draft = 1;
    case Published = 2;
    case Deleted = 3;
}
