<p align="right">
  <a href="README.md">English</a> | <strong>中文文档</strong>
</p>

# SuperKernel Skeleton

`super-kernel/skeleton` 是 SuperKernel 框架的项目模板。使用 Composer 从 Packagist 创建一个新应用：

```bash
composer create-project "super-kernel/skeleton:^1.0.0-alpha.2" my-app
```

项目使用 [SKERNEL](https://github.com/super-kernel/skernel/releases) 构建和运行。`skernel run swoole:start` 会构建项目并启动其 Swoole 服务器，`composer start` 运行的就是这条命令。也可以先构建，再启动 PHP 入口：

```bash
skernel build
php bin/bootstrap.php swoole:start
```

执行 `composer install` 或 `composer update` 之后，以及修改带注解的类之后，请再次运行 `skernel build`；`composer test` 会先构建项目再运行测试。
