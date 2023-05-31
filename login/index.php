<?php require_once("../assets/includes/header.php");
/* Hier miss nog iets zodat de gebruiker meteen naar de desboard gaat waneer hij al is ingelogd. */
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