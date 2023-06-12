function invis(id) {
    document.getElementById(id).style.display = "none";
}

if (document.getElementById("pagina_blender")) {//Als blender pagina bestaat doe dan...
    document.getElementById("ag").addEventListener("click", () => {
        invis("amig");
    });
    document.getElementById("amig").addEventListener("click", () => {
        invis("ag");
    });
    document.getElementById("ag").addEventListener("keypress", () => {
        invis("amig");
    });
    document.getElementById("amig").addEventListener("keypress", () => {
        invis("ag");
    });
}