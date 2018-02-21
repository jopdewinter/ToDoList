<form method="POST">
    Name:<br>
    <input type="text" name="name">
    Time:
    <input type="text" name="time">
    <input type="submit" value="Submit">
</form>

<?php

include "config.php";

if (isset($_GET['listId'])) {
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
        $time = $_POST["time"];
        $id = $_GET['id'];

        $stmt = $conn->prepare("UPDATE tasks SET name = :name, time = :time WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;

        return true;
    }
} else {
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
        $id = $_GET['id'];

        $stmt = $conn->prepare("UPDATE list SET name = :name WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;

        return true;
    }
}