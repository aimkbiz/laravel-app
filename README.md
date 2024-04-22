# 使用技術/Usage environment
php 8.3.6 <br />
laravel Framework 11.4.0<br />
composer 2.7.2 <br /><br />

# 環境構築/environment building
◆.env.exampleを.envにリネーム
DBの接続先を変更する

```shell
git clone git@github.com:aimkbiz/laravel-app.git
cd laravel-app(インストールした場所)

# updateしてsailをインサート
composer update
php artisan sail:install

# バックグラウンドで実行
./vendor/bin/sail up -d

# マイグレーション
./vendor/bin/sail artisan migrate
```

# 概要/summary
【タイトル】寿命までやりたいことリスト100<br />
寿命までやりたいことを登録して状況を管理するサービス<br /><br />

# 学習内容<br />
・マイグレーション<br />
・コマンドからModel、controler作成<br />
・ルーティング<br />
・Blade Templates<br />
・ログイン認証<br />
・seeder<br />

【今後やること】<br />
・Facades<br />
・PHPUnit<br />
・ORM<br /><br />
