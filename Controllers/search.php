<?php
////////////////////////////////
//サーチコントローラー
///////////////////////////////

//設定を読み込む
include_once('../config.php');
//便利な関数を読み込み
include_once('../util.php');

//ツイートデーター操作モデルを読み込む
include_once('../Models/tweets.php');

// ログインしているか
$user = getUserSession();
if(!$user) {
    //ログインしていない
    header('Location:'. HOME_URL .'Controllers/sign-in.php');
    exit;
}

//検索キーワードを取得
$keyword = null;
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}

//画面表示
$view_user = $user;
$view_keywprd = $keyword
//ツイート一覧
$view_tweets = findTweets($user, $keyword);
include_once('../Views/search.php');

