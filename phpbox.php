$sql = "INSERT INTO users(name,email,pass) VALUES('$name','$email','$pass')";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();
 
//var_dump($stmt -> errorInfo());
 
if($stmt){
    echo 'データの追加が正常に終了しました<br>';
}
else{
    echo 'データの追加に失敗しました<br>';
    exit;
}
 
//データ追加後のテーブルデータの取得
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

echo '<div style="border: solid 1px black; margin:5px;">';
    echo '<form action="update_form.php" method="post">';
    $update_id = $result['id'];
    echo '<button value="<?php $update_id?>">update</button>';