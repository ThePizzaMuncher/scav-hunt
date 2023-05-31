<?php require_once("../assets/includes/header.php");
if (isset($_SESSION["admin"]) || isset($_SESSION["docent"])) {
    if ($_SESSION["admin"]) {
        header("location: ../admin");
    }
    if ($_SESSION["docent"]) {
        header("location: ../docent");
    }
}
echo <<< inlog
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form method="post" action="send.php">
<input type="text" name="user">
<input type="password" name="pw">
<button type="submit" name="submit">
</form>
</body>
</html>
inlog;
?>