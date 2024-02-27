<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class TaskStatusEnum extends Enum implements LocalizedEnum
{
    const ACTIVE = 1;
    const NOT_ACTIVE = 2;
}
