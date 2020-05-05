<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


# About this application
### 名称
- Book Management App

### 概要
- 本を登録し、それを自分の本棚に追加することで読み終わった本やこれから読みたい本を管理できるアプリです。
- email, passward, nameを登録しユーザーログインすることで、これらの機能を利用することができます。
- 本棚に登録した本の情報から、ユーザーがどんなジャンルの本を好み、どのくらい本を読んでいるかをプロフィールに表示されます。
- プロフィールに表示された情報をTwitterで呟くことができます。

### このアプリでできること
- ユーザーログイン・ログアウト（ニックネーム・メールアドレス・パスワード）
- 本を登録（タイトル・ジャンル・総巻数・画像）
- 本を本棚に登録（ステータス・点数・読み終わった数量）
- プロフィールには読んだ本の合計、ジャンル毎の合計、肩書きを表示
- 本一覧画面ではタイトル検索ができる

### 本番環境
- デプロイ先：Heroku
- URL：

### 制作背景(意図)
- 漫画喫茶や本屋に行った際に、どの本を読みたいかを思い出させてくれるアプリが欲しいと思い作成しました。
- また、"漫画が好き"というだけでは相手に何がどのくらい好きなのか伝わらないので、それを一目でわかるように視覚化したいと思いました。

### 工夫したポイント
- 読んだ本の総数によってプロフィールの肩書きが変わる
- 部分検索機能の実装
- カテゴリごとに合計を出してグラフを生成
- Bootstrapを使用してレスポンシブデザイン

### 使用技術
- Laravel 5.7.28
- PHP 7.3.16
- javascript
- MySQL 5.6.46
- composer 1.10.1
- Heroku
- git
- Bootstrap

### 今後実装したい機能
- 本のソート機能
- 読んだ本の総数からユーザーランキングを表示する機能
- ユーザーランキングから他ユーザーのプロフィールにアクセスできる機能
- プロフィールから他ユーザーをフォローする機能
- 相互フォロワーがメッセージのやり取りができる機能
- dockerへの搭載
- AWSへのデプロイ

### 今後の課題
- 本を重複して登録できないようにバリデーション設定
- 本を編集する際に自分にバリデーションがかからないように設定
- 本を本棚に重複して登録できないようにバリデーション設定
- 本棚を編集する際に自分にバリデーションがかからないように設定


# DB設計


## ER図
https://gyazo.com/dffab108ef4533898670abb269c81a40


## usersテーブル
|Column|Type|Options|
|------|----|-------|
|name             |string   |null: false, unique: true|
|email            |string   |null: false, unique: true|
|password         |string   |null: false              |
|email_verified_at|timestamp|null: false              |


## booksテーブル
|Column|Type|Options|
|------|----|-------|
|title              |string   |null: false, unique: true|
|book_volume        |integer  |null: false |
|genre              |integer  |null: false |
|created_at         |timestamp|null: false |
|updated_at         |timestamp|null: false |


## shelfsテーブル
|Column|Type|Options|
|------|----|-------|
|point              |integer    |null: false |
|status             |integer    |null: false |
|finished_amount    |integer    |null: false |
|created_at         |timestamp  |null: false |
|updated_at         |timestamp  |null: false |
|user_id            |integer    |null: false, foreign_key: true |
|book_id            |integer    |null: false, foreign_key: true |
### Association
- belong_to :user
- belong_to :book