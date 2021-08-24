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

echo 'データ追加前のテーブル<br>';
while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
    echo($result['id'].'_');
    echo($result['name'].'_');
    echo($result['email'].'_');
    echo($result['pass'].'<br>');
}
echo '<br>';
 
//データの追加
$sql = "INSERT INTO users(id,name,email,pass) VALUES('4','都築','techmeets4@gmail','2345')";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();

if($stmt){
    echo 'データの追加が正常に終了しました<br>';
}
else{
    echo 'データの追加に失敗しました<br>';
    exit;
}
 
$sql = "SELECT * FROM users";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();
 
echo 'データ追加後のテーブル<br>';
while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
    echo($result['id'].'_');
    echo($result['name'].'_');
    echo($result['email'].'_');
    echo($result['pass'].'<br>');
}
echo '<br>';

$sql = "UPDATE users SET name = '酒井' WHERE id = '4'";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();
 
if($stmt){
    echo 'データの更新が正常に終了しました<br>';
}
else{
    echo 'データの更新に失敗しました<br>';
    exit;
}


?>

<a href="./update.php">update</a>
<a href="./select.php">select</a>
<a href="./delete.php">delete</a>