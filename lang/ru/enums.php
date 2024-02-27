<?php

declare(strict_types=1);

use App\Enums\TaskStatusEnum;

return [

    TaskStatusEnum::class => [
        TaskStatusEnum::ACTIVE => 'Активен',
        TaskStatusEnum::NOT_ACTIVE => 'Не активен',
    ],
];
