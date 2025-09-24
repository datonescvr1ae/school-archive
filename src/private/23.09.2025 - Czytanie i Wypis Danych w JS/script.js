const przeslijButton = document.getElementById("przeslij");

const wynik = document.getElementById("wynik");

function onPrzeslijClicked() {
       const imie = document.getElementById("imie").value;
       const nazwisko = document.getElementById("nazwisko").value;
       const email = document.getElementById("email").value;
       const usluga = document.getElementById("usluga").value;

       wynik.innerHTML = `${imie} ${nazwisko}<br>${email.toLowerCase()}<br>Usluga: ${usluga}`;
}

przeslijButton.addEventListener("click", onPrzeslijClicked);
