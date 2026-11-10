<p align="right">
  <strong>English</strong> | <a href="README.zh-CN.md">中文文档</a>
</p>

# SuperKernel Skeleton

`super-kernel/skeleton` is the project template for the SuperKernel framework. Create a new application from Packagist with Composer:

```bash
composer create-project "super-kernel/skeleton:^1.0.0-alpha.2" my-app
```

The project is built and run with [SKERNEL](https://github.com/super-kernel/skernel/releases). `skernel run swoole:start` builds the project and starts its Swoole server, and `composer start` runs that command. Alternatively, build first and then start the PHP entry:

```bash
skernel build
php bin/bootstrap.php swoole:start
```

Run `skernel build` again after `composer install` or `composer update` and after changing annotated classes; `composer test` builds the project before it runs the tests.
