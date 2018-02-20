<!DOCTYPE HTML>
<html>
<head>
    <title>To do list</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<h1>To do:</h1>

<form method="POST">
    Name:<br>
    <input type="text" name="name">
    <input type="submit" value="Submit">
</form>

</body>
</html>

<?php

include 'config.php';

$stmt = $conn->prepare("SELECT * FROM list");
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    echo "<br>" . "<a href='delete.php?id=" . $row["id"] . "''>";
    echo $row["name"];
    echo "</a>";
}

if (isset($_POST["name"])) {
    $stmt = $conn->prepare("INSERT INTO list(name) VALUES (:listname)");
    $stmt->bindParam(':listname', $_POST["name"]);
    $stmt->execute();

    return true;
}

?>