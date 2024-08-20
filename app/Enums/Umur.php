<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum Umur: int {
    use InteractWithEnum;

    case DIBAWAH_5_TH = 0;
    case ANTARA_6_11 = 1;
    case ANTARA_12_17 = 2;
    case ANTARA_18_40  = 3;
    case ANTARA_41_65 = 4;
    case DIATAS_61 = 5;   
}
