<!DOCTYPE HTML>
<html>
<head>
    <title>To do list</title>
</head>
<body>

<h1>To do:</h1>

<div style='border-style: solid;'>
    Add list:
    <form method="POST">
        Name:<br>
        <input type="text" name="name">
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>

<?php

include 'config.php';

$stmt = $conn->prepare("SELECT * FROM list");
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    echo "<div style='border-style: dashed;'>";
    echo "<br>" . "<a style='display: inline-block;' href='tasks.php?listId=" . $row["id"] . "'>";
    echo $row["name"];
    echo "</a>";
    echo "<br>" . "<a href='edit.php?id=" . $row["id"] . "'>edit</a>";
    echo "<br>" . "<a href='delete.php?id=" . $row["id"] . "'>delete</a>";
    echo "</div>";
}

if (isset($_POST["name"])) {
    $stmt = $conn->prepare("INSERT INTO list(name) VALUES (:listname)");
    $stmt->bindParam(':listname', $_POST["name"]);
    $stmt->execute();

    header("Location: {$_SERVER['HTTP_REFERER']}");

    return true;
}

?>