<?php
session_start();
require_once("../assets/includes/conn.php");
if (!isset($_SESSION["student_login"])) {
    header("location: ../login/student_login.php");
    die();
}
echo "
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Tussenstand groepjes</title>
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
</style>
</head>
<body>

</body>
</html>
";
$groepID = $_SESSION["student_groepID"];
$opleidingID = $_SESSION["student_opleidingID"];
$pull = $conn->query("SELECT * FROM vraag WHERE vragenlijst_ID = (SELECT ID FROM vragenlijst WHERE docent_ID = (SELECT ID FROM docent WHERE opleiding_ID = $opleidingID))");
$pull2 = $conn->query("SELECT * FROM groep WHERE docent_ID = (SELECT ID FROM docent WHERE opleiding_ID = $opleidingID)");
echo "<div class='gordel'>";
while ($row = $pull2->fetch_assoc()) {
    echo "
    <div id='$row[ID]' height='$row[score]" . "vw" . "' class='balk'>
    <p class='naam'>$row[groepsnaam]</p>
    </div>
    ";
}
echo "</div>";//Afsluiten van gordel tag
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
</style>
-->