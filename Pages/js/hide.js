var textControl = document.getElementById("tratamentalergii");
    var buttonHide = document.getElementById("less");
    textControl.style.display = "none";
    function unhide() {
     
      if (textControl.style.display === "none") {
        textControl.style.display = "block";
        buttonHide.innerHTML = "Ascunde Alergii si Tratamente"
      } else {
        textControl.style.display = "none";
        buttonHide.innerHTML = "Vezi Alergii si Tratamente"
      }
    }