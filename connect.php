<?php
$db = mysqli_connect("localhost","user_list_admin","userListAdmin","user_list");
mysqli_set_charset($db,'utf8');

if(!$db){
    die('失敗');
}
echo "成功";

$sql 
?>
<a href="./select.php">ユーザー一覧</a>