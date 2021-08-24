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
// var_dump($result[0]);
// echo '<br>';
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
    <?php foreach ($result as $key => $val):?>
        <div style="border:solid 1px black;">
            <form action="update_form.php" method="post">
                <button name="update" value="<?php echo $val['id']?>">update</button>
            </form>
            <p><?php echo $val['id'].'_', $val['name'].'_', $val["email"];?></p>
        </div>
    <?php endforeach;?>
</body>
</html>