<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum Marital: int  {
    use InteractWithEnum;

    case BELUM_KAWIN = 1;
    case KAWIN = 2;
    case CERAI_HIDUP = 3;
    case CERAI_MATI = 4;
}
