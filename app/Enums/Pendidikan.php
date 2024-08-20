<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum Pendidikan: int {
    use InteractWithEnum;

    case TIDAK_SEKOLAH = 0;
    case SD = 1; 
    case SMP = 2; 
    case SMA = 3; 
    case D3 = 4; 
    case D4 = 5;
    case S1 = 6; 
    case S2 = 7; 
    case S3 = 8; 
}