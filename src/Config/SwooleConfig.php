<?php

declare(strict_types=1);

namespace Src\Config;

use SuperKernel\Attribute\Configuration;
use SuperKernel\Contract\VendorDirInterface;
use SuperKernel\Swoole\Config\SwooleConfigInterface;

use function str_starts_with;

use const DIRECTORY_SEPARATOR;

#[Configuration(SwooleConfigInterface::class)]
final readonly class SwooleConfig implements SwooleConfigInterface
{
    public function __construct(private VendorDirInterface $vendorDir)
    {
    }

    public function daemon(): bool
    {
        return false;
    }

    /**
     * Keeps the PID file in the vendor cache directory. A Phar offers no writable location, so the application then
     * runs in the foreground without one; daemon mode needs an absolute path outside the archive.
     */
    public function pidFile(): ?string
    {
        $vendorDirectory = (string) $this->vendorDir;

        if (str_starts_with($vendorDirectory, 'phar://')) {
            return null;
        }

        return $vendorDirectory . DIRECTORY_SEPARATOR . '.cache' . DIRECTORY_SEPARATOR . 'super-kernel.pid';
    }

    public function displayErrors(): bool
    {
        return true;
    }

    public function socketBufferSize(): int
    {
        return 8 * 1024 * 1024;
    }

    public function enablePreemptiveScheduler(): bool
    {
        return false;
    }
}
