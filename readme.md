#### 1. 安装扩展包依赖

    composer install

#### 2. 生成配置文件

```
cp .env.example .env
```

你可以根据情况修改 `.env` 文件里的内容，如数据库连接、缓存、邮件设置等。


#### 3. 生成秘钥

```shell
php artisan key:generate
```

#### 4. 数据库迁移

```shell
php artisan migrate
```
使用数据库迁移必须将.env文件的数据库部分配置正确否则会报错