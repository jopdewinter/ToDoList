<?php

include "config.php";

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM list WHERE id = $id");
$stmt->bindParam(':id', $_POST["id"]);
$stmt->execute();

return true;