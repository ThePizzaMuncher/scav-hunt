if (document.getElementById("pagina_blender")) {
    document.getElementById("ag").addEventListener("click", () => {
        document.getElementById("amig").style.display = "none";
        console.log("klik op ag");
    });
    document.getElementById("amig").addEventListener("click", () => {
        document.getElementById("ag").style.display = "none";
        console.log("klik op amig");
    });
}