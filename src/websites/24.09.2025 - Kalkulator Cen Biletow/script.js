const obliczButton = document.getElementById("oblicz");
const wynik = document.getElementById("wynik");

function wypiszWynik(imie, cena) {
    wynik.innerHTML = `${imie}, Cena twojego biletu wynosi ${cena}zł`;
    wynik.style.color = "green";
}

function onObliczClicked() {
    const imie = document.getElementById("imie").value;
    const wiek = document.getElementById("wiek").value;

    if (imie != "" && wiek != "") {
        if (wiek < 18) {
            wypiszWynik(imie, 10);
        } else if (wiek >= 18 && wiek <= 65) {
            wypiszWynik(imie, 20);
        } else {
            wypiszWynik(imie, 15);
        }
    } else {
        wynik.innerHTML = "Wypełnij wszystkie pola!";
        wynik.style.color = "red";
    }
}

obliczButton.addEventListener("click", onObliczClicked);
