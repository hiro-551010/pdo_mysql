<?php
//DB接続情報
$dsn = 'mysql:host=localhost;dbname=user_list';
$user = 'user_list_admin';
$pass = 'userListAdmin';
 
try{
    $dbh = new PDO($dsn,$user,$pass);
    echo '接続成功<br>';
}catch(PDOException $e){
    echo '接続失敗<br>'.$e -> getMessage();
    exit;
};

//テーブルデータの取得
$sql = "SELECT * FROM users";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();

$result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
echo ($result);
echo '<br>';
?>
<a href="./index.html">ユーザー登録に戻る</a>
<a href="./select.php">ユーザー一覧</a>
