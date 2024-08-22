<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum Umur: int {
    use InteractWithEnum;

    case DIBAWAH_5_TH = 1;
    case ANTARA_6_11 = 2;
    case ANTARA_12_17 = 3;
    case ANTARA_18_40  = 4;
    case ANTARA_41_65 = 5;
    case DIATAS_61 = 6;   
}
