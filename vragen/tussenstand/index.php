<?php
session_start();
require_once("../assets/includes/conn.php");
if (!isset($_SESSION["student_login"])) {
    header("location: ../login/student_login.php");
    die();
}
require_once("../assets/includes/header.php");
echo "
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Tussenstand groepjes</title>
<style>
.balk {
    background-color: blue;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-bottom: 0.5vw;
}
.naam {
    color: white;
    text-shadow: 0.2vw 0.2vw 0.2vw black;
    font-size: 1.2vw;
}
.gordel {
    width: 100%;
    height: 14vw;
    display: flex;
    align-items: end;
    justify-content: space-around;
    text-align: center;
    flex-direction: row;
    background-color: #737373;
}
body {
    margin: 0vw;
}
</style>
</head>
<body>
";
$opleidingID = $_SESSION["student_opleidingID"];
$pull = $conn->query("SELECT * FROM groep WHERE docent_ID = (SELECT ID FROM docent WHERE opleiding_ID = $opleidingID)");
echo "<div class='gordel'>";
while ($row = $pull->fetch_assoc()) {
    echo "
    <div id='$row[ID]' style='height: " . ($row["score"] + $row["current_vraag"]) / 2 + 0.5. "vw; width: 4vw;' class='balk'>
    <p class='naam'>$row[groepsnaam]</p>
    </div>
    ";
}
echo "</div>";//Afsluiten van gordel tag
require_once("../assets/includes/footer.php");
?>
<!--
<style>
.balk {
    width: 4vw;
    background-color: blue;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}
.naam {
    color: white;
    text-shadow: 0.2vw 0.2vw 0.2vw black;
    font-size: 1.2vw;
}
.gordel {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-around;
    text-align: center;
    flex-direction: row;
}
body {
    margin: 0vw;
}
</style>
-->