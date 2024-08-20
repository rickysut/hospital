<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum Hubungan: int {
    use InteractWithEnum;

    case DIRI_SENDIRI = 0;
    case ORANG_TUA = 1;
    case ANAK = 2;
    case SUAMI_ISTRI = 3;
    case KERABAT = 4;
    case LAINNYA = 5;
}
