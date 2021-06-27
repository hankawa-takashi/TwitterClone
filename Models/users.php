<?php
/////////////////////
//ユーザーデーターを処理
/////////////////////


/****
 * ユーザーを作成
 * 
 * @param array $HTTP_RAW_POST_DATA
 * @return bool
 */
function createUser(array $data)
{
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    //接続チェック
    if ($mysqli->connect_errno) {
        echo 'MYSQLの接続に失敗しました。:' . $mysqli->connect_error . '\n';
        exit;
    }

    //新規登録のＳＱＬを作成
    $query = 'INSERT INTO users (email, name, nickname, password) VALUES(?,?,?,?)';
    $statement = $mysqli->prepare($query);

    // パスワードをハッシュ値に変換
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    // ? の部分にセットする内容
    //第一引数のｓは変数の型(string)を指定
    $statement->bind_param('ssss', $data['email'], $data['name'],  $data['nickname'], $data['password']);

    //処理を実行
    $response = $statement->execute();
    if($response === false) {
        echo 'エラーメッセージ　:'. $mysqli->error . "\n";
    }

    //接続を解放
    $statement->close();
    $mysqli->close();

    return $response;

}
