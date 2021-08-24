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

//テーブルデータの取得
$sql = "SELECT * FROM users WHERE id=$update_id";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();

while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
    $update = $result['id'];
    $name = $result['name'];
    $email = $result['email'];
    $pass = $result['pass'];
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="update.php" method="post">
        <p>updateするid: <span><?php echo $update?></span></p>
        <input type="hidden" name="update" value="<?php echo $update;?>">
        <label>名前</label>
        <input type="text" name="name" value="<?php echo $name;?>">
        <label>メールアドレス</label>
        <input type="text" name="email" value="<?php echo $email;?>">
        <label>パスワード</label>
        <input type="text" name="pass" value="<?php echo $pass;?>">
        <input type="submit">
    </form>
</body>
</html>