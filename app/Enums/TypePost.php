<?php

namespace App\Enums;

enum TypePost: int
{
    case News = 1;
    case Opinion = 2;
    case Event = 3;
    case Announcement = 4;
}
