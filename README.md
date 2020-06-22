# codelike bbs
laravelで作成した掲示板です！
laravel 5.8で動いています。

## 動かす
### envを設定
```
cp .env.example .env
```

### salite databaseを作って、マイグレーションする
```
touch database/database.sqlite
```

```
php artisan migrate
```

### 起動する
```
php artisan serve --host 127.0.0.1 --port 8000
```
