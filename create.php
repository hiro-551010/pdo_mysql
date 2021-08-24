<?php
if(count($_POST) === 0){

	header('location: index.html');
	exit();
}

$db = mysqli_connect("localhost","user_list_admin","userListAdmin","user_list");
mysqli_set_charset($db,'utf8');

if(!$db){
    die('失敗');
}
echo('接続成功'."\n");

$name = "'".$_POST['name']."'";
$email = "'".$_POST['email']."'";
$pass = "'".$_POST['pass']."'";

$sql = 'INSERT INTO users VALUES(null,'.$name.','.$email.','.$pass.');';
$result = mysqli_query($db,$sql);
if(!$result){
	echo('書き込み失敗'."\n");
	echo(mysqli_error($db));
}
echo('書き込み成功'."\n");
?>
<a href="./select.php">ユーザー一覧</a>
