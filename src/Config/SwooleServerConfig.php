<?php

declare(strict_types=1);

namespace Src\Config;

use SuperKernel\Attribute\Configuration;
use SuperKernel\Server\Config\SwooleServerConfigInterface;
use SuperKernel\Server\Enum\Mode;
use SuperKernel\Server\Enum\Protocol;
use Swoole\Constant;

#[Configuration(SwooleServerConfigInterface::class)]
final readonly class SwooleServerConfig implements SwooleServerConfigInterface
{
    public function enable(): bool
    {
        return true;
    }

    public function mode(): Mode
    {
        return Mode::Base;
    }

    public function listeners(): array
    {
        return [
            [
                'name'     => 'http',
                'host'     => '127.0.0.1',
                'port'     => 9600,
                'protocol' => Protocol::Http,
            ],
        ];
    }

    public function settings(): array
    {
        return [
            Constant::OPTION_ENABLE_COROUTINE => true,
        ];
    }
}
