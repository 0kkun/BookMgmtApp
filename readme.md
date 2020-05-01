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
- 本を登録（タイトル・総巻数・画像）
- 本を本棚に登録（ステータス・点数）
- プロフィールに読んだ本のジャンル毎の数、総数、肩書きを表示
- プロフィールの情報をTwitterに投稿

### 本番環境
- デプロイ先：AWS
- URL：

### 制作背景(意図)
- 漫画喫茶や本屋に行った際に、どの本を読みたいかを思い出させてくれるアプリが欲しいと思い作成しました。
- また、"漫画が好き"というだけでは相手に何がどのくらい好きなのか伝わらないので、それを一目でわかるように視覚化したいと思いました。

### 工夫したポイント
- 読んだ本の総数によってプロフィールの肩書きが変わることで、もっと本を読みたいと思わせるように設計
- TwitterのAPIを実装
- Bootstrapを使用してレスポンシブデザイン

### 使用技術
- Laravel 5.7.28
- PHP 7.3.16
- javascript
- MySQL 5.6.46
- composer 1.10.1
- AWS
- git

### 課題や今後実装したい機能
- 読んだ本の総数からユーザーランキングを表示する機能
- ユーザーランキングから他ユーザーのプロフィールにアクセスできる機能
- プロフィールから他ユーザーをフォローする機能
- 相互フォロワーがメッセージのやり取りができる機能
- dockerへの搭載

### DB設計

## ER図
https://gyazo.com/dffab108ef4533898670abb269c81a40

## usersテーブル
|Column|Type|Options|
|------|----|-------|
|name             |string   |null: false, unique: true|
|email            |string   |null: false, unique: true|
|password         |string   |null: false              |
|email_verified_at|timestamp|null: false              |
### Association
- belong_to :shelf


## booksテーブル
|Column|Type|Options|
|------|----|-------|
|title              |string   |null: false, unique: true|
|book_volume        |integer  |null: false |
|genre              |integer  |null: false |
|created_at         |timestamp|null: false |
|updated_at         |timestamp|null: false |
### Association
- belong_to :shelf


## shelfsテーブル
|Column|Type|Options|
|------|----|-------|
|point        |integer    |null: false |
|status       |integer    |null: false |
|created_at   |timestamp  |null: false |
|updated_at   |timestamp  |null: false |
|user_id      |integer    |null: false, foreign_key: true |
|book_id      |integer    |null: false, foreign_key: true |
### Association
- belong_to :user
- has_many :books