<?php
require_once("../assets/includes/conn.php");
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
    <input type="submit" name="submit" value="Aanmelden">
    </form>
</body>
</html>
';
if (isset($_SESSION["stl_fb"]) && $_SESSION["stl_fb"] != "0") {
    echo "<script defer>window.alert('" . $_SESSION["stl_fb"] . "')</script>";
}
?>
