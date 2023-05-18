<?php
/* Even een voorbeeld van dat de docent eerst moet ingelogd zijn etc...
if ($_SESSION["login_docent"] == "true") {

}
else {
    header("location: ../");//Als je niet bent ingelogd, ga dan weer terug.
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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="../access/js/docent.js" defer></script>
    <script type="module" src="../access/js/maps.js" defer></script>
    <link rel="stylesheet" href="../access/css/style.css">
</head>
<body>
    <p>Naam: <span id="name"></span></p>
    <p>Nummer: <span id="number"></span></p>
    <p>x: <span id="x"></span></p>
    <p>y: <span id="y"></span></p>
    <p>Datum: <span id="date"></span></p>
    <div id="map"></div>
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg", v: "beta"});</script>
</body>
</html>
main;
?>