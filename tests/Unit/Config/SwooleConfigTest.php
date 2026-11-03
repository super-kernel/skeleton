<?php

declare(strict_types=1);

namespace Src\Tests\Unit\Config;

use PHPUnit\Framework\TestCase;
use Src\Config\SwooleConfig;
use SuperKernel\Contract\VendorDirInterface;

final class SwooleConfigTest extends TestCase
{
    public function testKeepsThePidFileInTheVendorCacheDirectory(): void
    {
        self::assertSame(
            '/project/vendor/.cache/super-kernel.pid',
            new SwooleConfig($this->vendorDirectory('/project/vendor'))->pidFile(),
        );
    }

    public function testRunsWithoutAPidFileInsideAPhar(): void
    {
        self::assertNull(new SwooleConfig($this->vendorDirectory('phar:///opt/application.phar/vendor'))->pidFile());
    }

    private function vendorDirectory(string $path): VendorDirInterface
    {
        return new readonly class($path) implements VendorDirInterface {
            /** @param non-empty-string $path */
            public function __construct(private string $path)
            {
            }

            public function __toString(): string
            {
                return $this->path;
            }
        };
    }
}
