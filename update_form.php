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

$update_id = $_POST['update'];
var_dump($update_id);
//テーブルデータの取得
$sql = "SELECT * FROM users WHERE id=$update_id";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();

while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
    echo($result['id'].'_');
    echo($result['name'].'_');
    echo($result['email'].'_');
    echo($result['pass'].'<br>');
}

echo '<br>';