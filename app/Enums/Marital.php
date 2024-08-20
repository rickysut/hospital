<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum Marital: int  {
    use InteractWithEnum;

    case BELUM_KAWIN = 0;
    case KAWIN = 1;
    case CERAI_HIDUP = 2;
    case CERAI_MATI = 3;
}
