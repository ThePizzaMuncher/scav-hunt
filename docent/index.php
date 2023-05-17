<?php
/* Even een voorbeeld van dat de docent eerst moet ingelogd zijn etc...
if ($_SESSION["login_docent"] == "true") {

}
else {
    header("location: ../");
}
*/
echo <<< main
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docent pagina</title>
    <script src="../access/js/docent.js" defer></script>
</head>
<body>
    <p id="input"></p>
</body>
</html>
main;
?>