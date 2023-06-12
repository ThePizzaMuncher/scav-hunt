function invis(id) {
    document.getElementById(id).style.display = "none";
}

if (document.getElementById("pagina_blender")) {//Als blender pagina bestaat doe dan...
    document.getElementById("ag").addEventListener("click", () => {
        invis("amig");
        invis("2");
    });
    document.getElementById("amig").addEventListener("click", () => {
        invis("ag");
        invis("1");
    });
    document.getElementById("ag").addEventListener("keypress", () => {
        invis("2");
        invis("amig");
    });
    document.getElementById("amig").addEventListener("keypress", () => {
        invis("1");
        invis("ag");
    });
}