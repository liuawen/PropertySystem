<?php
$id=$_GET['id'];
require('conn.php');
$sql="delete from fee_info where fee_id={$id}";
if ($pdo->exec($sql)) {
    $url='home.php';
    header('Location:'.$url);
}
?>