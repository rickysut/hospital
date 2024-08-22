<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum Agama: int {
    use InteractWithEnum;

    case ISLAM = 1; 
    case KRISTEN = 2; 
    case KATOLIK = 3; 
    case HINDU = 4; 
    case BUDHA = 5; 
    case KONGHUCU = 6; 
    case PENGAYAT = 7; 
    case LAINLAIN = 8;
}