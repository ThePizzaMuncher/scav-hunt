<?php
require_once("../includes/conn.php");
session_start();
if (isset($_POST["code"]) && !empty($_POST["code"]) && isset($_POST["submit"])) {
    $code = $_POST["code"];
    $pull = $conn->query("SELECT code FROM uniekecode WHERE ID = 1");
    while ($row = $pull->fetch_assoc()) {//Enkelijke executie
        if ($row["code"] == $code) {
            $_SESSION["student_login"] = true;
            $_SESSION["stl_fb"] = "0";
        }
        else {
            $_SESSION["student_login"] = false;
            $_SESSION["stl_fb"] = "Error: code ongeldig.";//StudentLogin Feedback
        }
    }
}
header("location: ../../login/student_login.php");
?>