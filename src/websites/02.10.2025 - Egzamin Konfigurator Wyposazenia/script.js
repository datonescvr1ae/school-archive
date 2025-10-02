const kolorInput = document.getElementById("kolor-input");
const carFoto = document.getElementById("foto");

const felgiStalowe = document.getElementById("stalowe");
const felgiAluminiowe = document.getElementById("aluminiowe");

const czujniki = document.getElementById("czujniki");
const climatronic = document.getElementById("climatronic");
const nawigacja = document.getElementById("nawigacja");

const wycena = document.getElementById("wycena");
const cenaRazem = document.getElementById("cena-razem");

function calculateWycena() {
    const kolorLakieru = kolorInput.value;

    const felgiAluminioweValue = felgiAluminiowe.checked;

    const czujnikiValue = czujniki.checked;
    const climatronicValue = climatronic.checked;
    const nawigacjaValue = nawigacja.checked;

    let totalCena = 75000;
    let displayString = `Cena bazowa: ${totalCena} zl`;

    if (kolorLakieru != "szary") {
        totalCena += 9000;
        displayString += "<br>Lakier: 9000 zl";
    }

    if (felgiAluminioweValue == true) {
        totalCena += 7000;
        displayString += "<br>Felgi aluminiowe: 7000 zl";
    }

    if (czujnikiValue == true) {
        totalCena += 6500;
        displayString += "<br>Czujniki parkowania: 6500 zl";
    }

    if (climatronicValue == true) {
        totalCena += 8500;
        displayString += "<br>Climatronic: 8500 zl";
    }

    if (nawigacjaValue == true) {
        totalCena += 5000;
        displayString += "<br>Nawigacja: 5000 zl";
    }

    wycena.innerHTML = displayString;
    cenaRazem.innerHTML = `RAZEM: ${totalCena} zl`;
}

function onKolorInputChanged() {
    const newKolor = kolorInput.value;
    carFoto.src = `${newKolor}.png`;

    calculateWycena();
}

kolorInput.addEventListener("change", onKolorInputChanged);

felgiStalowe.addEventListener("change", calculateWycena);
felgiAluminiowe.addEventListener("change", calculateWycena);

czujniki.addEventListener("change", calculateWycena);
climatronic.addEventListener("change", calculateWycena);
nawigacja.addEventListener("change", calculateWycena);
