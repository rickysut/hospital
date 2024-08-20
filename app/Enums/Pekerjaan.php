<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum Pekerjaan: int {
    use InteractWithEnum;

    case TIDAK_BEKERJA = 0;
    case PNS = 1;
    case TNI_POLRI = 2;
    case BUMN = 3;
    case SWASTA = 4;
    case LAIN_LAIN = 5;
}
