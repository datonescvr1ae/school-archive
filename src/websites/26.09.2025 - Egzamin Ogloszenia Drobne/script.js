const kalkulacjaButton = document.getElementById("kalkulacja");
const wynik = document.getElementById("wynik");

function onKalkulacjaClicked() {
    const liczbaOgl = document.getElementById("liczba-ogl").value;
    const stalyKlient = document.getElementById("staly-klient").checked;

    let cena;

    if (liczbaOgl <= 40) {
        cena = 3;
    } else {
        cena = 2;
    }

    if (stalyKlient === true) cena -= 0.3;

    wynik.innerHTML = `Twoje ogłoszenia będą kosztować: ${cena * liczbaOgl} PLN`;
}

kalkulacjaButton.addEventListener("click", onKalkulacjaClicked);
