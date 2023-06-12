if (document.getElementById("pagina_blender")) {
    document.getElementById("ag").addEventListener("click", () => {
        document.getElementById("amig").style.display = "none";
    });
    document.getElementById("amig").addEventListener("click", () => {
        document.getElementById("ag").style.display = "none";
    });
}

function incrementValue(button) {
    var input = button.parentNode.querySelector('input[type="number"]');
    var value = parseInt(input.value);
    input.value = value + 1;
  }

  function decrementValue(button) {
    var input = button.parentNode.querySelector('input[type="number"]');
    var value = parseInt(input.value);
    if (value > 0) {
      input.value = value - 1;
    }
  }