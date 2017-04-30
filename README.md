# Blogアプリ

PHPでつくる簡易Blogアプリです。
PHP初学者向けのアプリです。OOPやデータベースは使っていません。

+ 記事データはJSONファイルで管理しています。
+ 定数や関数はcommon/functions.phpで定義しています。
+ ログインエラーを除く、すべてのエラー（入力エラー含む）は、common/error.phpを表示します。

<img src="https://s3-ap-northeast-1.amazonaws.com/itcaret/php_blog/demo1.png" width="300px">

<img src="https://s3-ap-northeast-1.amazonaws.com/itcaret/php_blog/demo2.png" width="300px">

## Blogアプリの構成など

このアプリは、ブログ閲覧機能とブログ管理機能の2つを含みます。

アプリを起動するには、PHPのインストールされている環境で、以下のコマンドを実行します。

```
php -S localhost:18000
```

### 記事閲覧機能

記事の一覧表示、詳細表示機能を提供します。

http://localhost:8000/index.php にアクセスします。

記事閲覧機能のPHPプログラムはルートディレクトリにあります。index.php、show.phpの2つです。

### 記事管理機能（admin）

記事の一覧表示、新規登録、更新、削除機能を提供します。

http://localhost:8000/admin/login.php にアクセスします。

記事管理機能のPHPプログラムはadminディレクトリにあります。

### 共通機能（common）

共通機能はfunctions.php、error.phpの2つです。

+ functions.phpには、記事データのCRUD処理、画面のリダイレクト処理などを実装しています。
+ error.phpはエラー画面です。

### この課題で達成しないこと

+ JavaScriptやCSSといったクライアントサイドの実装。任意で追加実装してください。
+ ファイルの排他制御。正しく作るならデータベースを使うべきです。PHPでMySQLを使うならOOPの知識が必要です。
+ 厳密なセッション管理。ログアウト機能は実装していません。
