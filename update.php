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

$id = $_POST['update'];
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

// 基本形
// $sql = "UPDATE users SET name='taisho' WHERE id = 18";

$sql = "UPDATE users SET name='$name', email='$email', pass='$pass' WHERE id = $id";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();

echo $id.'_', $name.'_', $email.'_', $pass.'_', 'に変更しました <br>';
?>

<a href="./index.html">ユーザー登録に戻る</a>
<a href="./index.php">ユーザー一覧</a>