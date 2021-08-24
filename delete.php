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

$sql = 'DELETE FROM users WHERE id = 15';
$stmt = $dbh -> prepare($sql);
$stmt -> execute();

while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
    echo($result['id'].'_');
    echo($result['name'].'_');
    echo($result['email'].'_');
}

?>
<a href="./select.php">ユーザー一覧</a>