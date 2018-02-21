<?php

include "config.php";

$id = $_GET['id'];

if (isset($_GET['listId'])) {
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;

    return true;
} else {
    $stmt = $conn->prepare("DELETE FROM list WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;

    return true;
}