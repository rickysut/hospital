<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum Hubungan: int {
    use InteractWithEnum;

    case DIRI_SENDIRI = 1;
    case ORANG_TUA = 2;
    case ANAK = 3;
    case SUAMI_ISTRI = 4;
    case KERABAT = 5;
    case LAINNYA = 6;
}
