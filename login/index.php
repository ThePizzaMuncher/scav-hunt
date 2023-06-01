<?php require_once("../assets/includes/header.php");
if (isset($_SESSION["admin"]) || isset($_SESSION["docent"])) {
    if ($_SESSION["admin"] == 1) {
        header("location: ../admin");
    }
    if ($_SESSION["docent"] == 1) {
        header("location: ../docent");
    }
}
if (isset($_SESSION["lfb"])) {
    $lfb = htmlspecialchars($_SESSION["lfb"]);
    if ($lfb != "") {
        echo <<< lfb
        <script>window.alert("$_SESSION[lfb]")</script>
        lfb;
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