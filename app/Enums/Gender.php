<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum Gender: int {
    use InteractWithEnum;

    case TDK_DIKETAHUI = 0; 
    case LAKI_LAKI = 1; 
    case PEREMPUAN = 2; 
    case TDK_DAPAT_DITENTUKAN = 3;
    case TDK_MENGISI = 4;
}


