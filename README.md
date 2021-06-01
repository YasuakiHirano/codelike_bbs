# codelike bbs
シンプルな掲示板のリポジトリ(Laravel + Nuxt.js + TypeScript)
v2.0に移行中...

## インストールと実行(install and run)
git cloneでクローンする。

```shell
git clone https://github.com/YasuakiHirano/codelike_bbs.git
```

docker-compose upで立ち上げる。

```shell
cd codelike_bbs
docker-compose -f .docker_codelike_bbs/docker-compose.yml up -d
```

phpMyAdmin: http://localhost:8091/ 

Sqlでデータベースを作成する


```sql
create database codelike_bbs;
```

ComposerでLaravelのライブラリを取得する。

```shell
cd backend
composer install
```

Laravelのマイグレーション実行して、テーブルを作成する。

```shell
cd backend
cp .env.example .env
php artisan migrate
```

フロントエンドを立ち上げる。

```shell
cd frontend
yarn install
yarn run dev
```

## v1.0

v1.0はこちら

https://github.com/YasuakiHirano/codelike_bbs/releases/tag/v1.0.0

https://github.com/YasuakiHirano/codelike_bbs/tree/v1.0.0
