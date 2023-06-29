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
    <input type="text" name="code">
    </form>
</body>
</html>
';
?>
