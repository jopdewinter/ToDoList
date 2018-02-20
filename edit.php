<form method="POST">
    Name:<br>
    <input type="text" name="name">
    <input type="submit" value="Submit">
</form>

<?php

include "config.php";

if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $id = $_GET['id'];

    $stmt = $conn->prepare("UPDATE list SET name = :name WHERE id = $id");
    $stmt->execute(array(
        ':name' => $name));

    return true;
}