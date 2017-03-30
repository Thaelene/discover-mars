<?php

include 'config.php';

$id = $_POST['id'];
$prepare = $pdo->prepare("UPDATE `photo-view` SET views = views + 1  WHERE id = :id");
$prepare->execute([':id' => $id]);
?>