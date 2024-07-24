<?php
session_start();
require_once('./scripts/checkloggedin.php');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel użytkownika</title>
</head>
<body>
    <h2>Panel użytkownika</h2>
    <?php
    echo "<b>Imię i nazwisko:</b></br> " . $_SESSION["userName"] . "</br>";
    echo "<b>Adres email:</b></br> " . $_SESSION["userEmail"] . "</br>";
    ?>
    <hr>
    <form action="./main.php" method="POST">
        <button type="submit" name="Wyloguj">Wyloguj się</button>
    </form>
</body>
</html>
