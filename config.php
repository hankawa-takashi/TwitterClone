<?php
//エラーの表示あり
ini_set('display_errors',1);
//日本時間に設定
date_default_timezone_set('Asia/Tokyo');
//URL/ディレクトリ設定
define('HOME_URL','/TwitterClone/');
//データーベースの接続情報
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'twitter_clone');