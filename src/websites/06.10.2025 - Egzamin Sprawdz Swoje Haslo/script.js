const sprawdzButton = document.getElementById("sprawdz");
const wynik = document.getElementById("wynik");

function onSprawdzClicked() {
       const haslo = document.getElementById("haslo").value;
       const hasNumbers = /\d/.test(haslo);

       if (haslo == "") {
              var jakosc = "<span style='color: red;'>WPISZ HASLO!</span>";
       } else if (haslo.length >= 7 && hasNumbers) {
              var jakosc = "<span style='color: green;'>DOBRE</span>";
       } else if (haslo.length >= 4 && haslo.length <= 6 && hasNumbers) {
              var jakosc = "<span style='color: blue;'>SREDNIE</span>";
       } else {
              var jakosc = "<span style='color: yellow;'>SLABE</span>";
       }

       wynik.innerHTML = jakosc;
}

sprawdzButton.addEventListener("click", onSprawdzClicked);
