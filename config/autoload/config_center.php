<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\ConfigApollo\PullMode;
use Hyperf\ConfigCenter\Mode;

return [
    'enable' => (bool) env('CONFIG_CENTER_ENABLE', true),
    'driver' => 'anyway', // env('CONFIG_CENTER_DRIVER', 'default'),
    'mode' => env('CONFIG_CENTER_MODE', Mode::PROCESS),
    'drivers' => [
        'anyway' => [
            'driver' => FriendsOfHyperf\ConfigAnyway\AnywayDriver::class,
            'mapping' => [
                '_setting' => fn () => ['now' => time()],
            ],
        ],
    ],
];
