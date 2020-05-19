<?php
$id=$_GET['id'];
require('conn.php');
$sql="delete from user_info where user_id={$id}";
if ($pdo->exec($sql)) {
    $url='list.php';
    header('Location:'.$url);
}
?>