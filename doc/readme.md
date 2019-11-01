## 多模块化开发

> 注：安装最新 Laravel-Modules 要求 PHP 版本在 7.0 以上，同时 Laravel 版本是 5.5.*。
```markdown
| **Laravel**  |  **laravel-modules** |
|---|---|
| 5.4  | ^1.0  |
| 5.5  | ^2.0  |
| 5.6  | ^3.0  |
| 5.7  | ^4.0  |
| 5.8  | ^5.0  |
| 6.0  | ^6.0  |
```
首先在 Laravel 项目根目录下使用 Composer 安装该扩展包：

```bash
composer require nwidart/laravel-modules ^2.0
```

该扩展包会自动注册服务提供者和别名。此外，你可以通过运行如下命令来发布配置文件：
```bash
php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"
```
我们可以通过如下命令生成应用的第一个模块：
```bash
php artisan module:make Blog
```

生成控制器
```bash
php artisan module:make-controller ArticlesController Blog
```

## restful接口版本控制
> dingo/api 是一个 Lumen 和 Laravel 都可用的 RestFul 工具包，帮助我们快速的开始构建 RestFul Api，在我看来，以下几个功能为 API 的开发带来的很大的方便：
* 通过 HTTP Accept 头来切换 API 版本；
* 可以快速配置 jwt-auth 完成用户认证；
* 很好的整合了 league/fractal 做数据层转换，同时解决了预加载的问题；
* 捕获错误和异常，以一个统一的格式返回；

安装
```bash
composer require dingo/api:^2.0.0-alpha2
```
会报错，修改composer.json 再重新安装
在config底部增加两句：

> "minimum-stability" : "dev", —— 设定的最低稳定性的版本为 dev ，也就是可以依赖开发版本的扩展包；
> "prefer-stable" : true      —— Composer 还是优先使用更稳定的包版本。

发布配置文件：
```bash
php artisan vendor:publish --provider="Dingo\Api\Provider\LaravelServiceProvider"
```

配置
发布完成了，要想开始使用这个扩展包，还需要进行一些相关的配置，这里有几个非常重要的配置，必须要了解：

* API_STANDARDS_TREE ——API 接口性质，三个值可选；
> x —— 本地开发的或私有环境的；
> prs —— 未对外发布的，提供给公司 APP，单页应用，桌面应用等；
> vnd —— 对外发布的，开放给所有用户。
* API_SUBTYPE —— 项目的简称；
* API_PREFIX —— 与 API_DOMAIN 二选一，路由的前缀，例如设置为 api，接口路由为 www.larabbs.com/api ；
* API_DOMAIN —— 与 API_PREFIX 二选一，路由域名，例如 api.larabbs.com；
* API_VERSION—— 接口版本；
* API_DEBUG—— Debug 模式，输出完整的 Debug 信息。
可以方便的配置到 .env 文件中，最后我们会配置成如下这样：

```log
# dingo
API_STANDARDS_TREE=prs
API_SUBTYPE=package
API_PREFIX=api
API_VERSION=v1
API_DEBUG=true
```

切换版本
想要切换版本需要增加一个 Accept 的头，格式是 Accept: application/prs.package.v2+json

清除缓存
```bash
php artisan view:clear
php artisan config:clear
```

代码版本控制
```bash
git add -A
git commit -m 'dingo/api'
```
