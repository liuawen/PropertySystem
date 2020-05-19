<?php
$id=$_GET['id'];
require('conn.php');
$sql="delete from admin_info where admin_id={$id}";
if ($pdo->exec($sql)) {
    $url='list.php';
    header('Location:'.$url);
}
?>