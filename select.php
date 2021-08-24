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

$sql = 'SELECT * FROM users WHERE id = id';
$stmt = $dbh -> prepare($sql);
$stmt -> execute();

while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
    echo($result['id'].'_');
    echo($result['name'].'_');
    echo($result['email'].'_');
    echo($result['pass'].'<br>');
}

?>
<a href="./update.php">update</a>
<a href="./select.php">select</a>
<a href="./delete.php">delete</a>
<a href="./index.html">ユーザー作成</a>