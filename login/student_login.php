<?php
require_once("../assets/includes/conn.php");
session_start();
echo '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="../assets/php/student_login_verw.php">
    <input type="text" name="code" required placeholder="Voer hier de code in">
    <input type="text" name="naam" required placeholder="Voer hier je naam in">
    <input type="submit" name="submit" value="Aanmelden">
    </form>
</body>
</html>
';
if (isset($_SESSION["stl_fb"]) && $_SESSION["stl_fb"] != "0") {
    echo "<script defer>
    setTimeout(() => {
        window.alert('" . $_SESSION["stl_fb"] . "');
    }, 200);
    </script>";
    $_SESSION["stl_fb"] = "0";
}
?>
