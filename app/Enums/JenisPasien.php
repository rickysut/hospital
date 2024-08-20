<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum JenisPasien: int {
    use InteractWithEnum;

    case BIASA = 0;
    case TIDAK_DIKENAL = 1;
    case BAYI = 2;
}