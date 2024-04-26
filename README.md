# 環境/environment
```
ubuntu 20.04.3 
php 8.3.6
laravel Framework 11.4.0
composer 2.7.2 
autoprefixer:10.4.12
axios:1.6.4
laravel-vite-plugin:1.0
postcss:8.4.31
react:18.2.0
react-dom:18.2.0
sass:1.75.0
tailwindcss:3.2.1
typescript:5.4.5
vite:5.0
```

# 環境構築/environment building

```
git clone git@github.com:aimkbiz/laravel-app.git
cd laravel-app
```

### .env.exampleを.envにリネーム
DBの接続先を変更する



###  updateしてsailをインサート
```
composer update
php artisan sail:install
```

### packageインストール
```
sail npm install
```

###  sailのエイリアスをbashrcに追加
```
vi ~/.bashrc
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

###  バックグラウンドで実行
```
sail up -d
```

### マイグレーション
```
sail artisan migrate
```

### seederでデータ作成
```
sail artisan migrate --seed
```

### reactを実行
```
sail npm run dev
```
screen機能を使ってバックグラウンドで実行する場合
```
screen -S react
cd /home/xxxx/github/laravel-app # インストールしている場所に移動
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
sail npm run dev
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

# エラー対応
### composer update実行時エラー
Composer is operating significantly slower than normal because you do not have the PHP curl extension enabled.
Loading composer repositories with package information
下記をインストール
sudo apt install php-curl

### 「npm run dev」実行時のエラー
Error: ENOSPC: System limit for number of file watchers reached, watch 
https://virment.com/how-to-fix-system-limit-for-number-of-file-watchers-reached/
◆サイズを確認
cat /proc/sys/fs/inotify/max_user_watches
◆サイズを増やす(私の場合は、24288で設定しました)
sudo sysctl fs.inotify.max_user_watches=524288
sudo sysctl fs.inotify.max_user_watches=24288
◆元に戻す
sudo sysctl fs.inotify.max_user_watches=8192
