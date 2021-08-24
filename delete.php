<?php
$dsn = 'mysql:host=localhost;dbname=user_list';
$user = 'user_list_admin';
$pass = 'userListAdmin';

try{
    $dbh = new PDO($dsn,$user,$pass);
    echo '接続成功<br>';
    echo '<br>';
}catch(PDOException $e){
    echo '接続失敗<br>'.$e -> getMessage();
    exit;
};

$delete_id = $_POST['delete'];


$sql = "DELETE FROM users WHERE id=$delete_id";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();

?>
<p>削除しました</p>
<a href="./index.php">ユーザー一覧</a>