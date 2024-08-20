<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum Agama: int {
    use InteractWithEnum;

    case ISLAM = 0; 
    case KRISTEN = 1; 
    case KATOLIK = 2; 
    case HINDU = 3; 
    case BUDHA = 4; 
    case KONGHUCU = 5; 
    case PENGAYAT = 6; 
    case LAINLAIN = 7;
}