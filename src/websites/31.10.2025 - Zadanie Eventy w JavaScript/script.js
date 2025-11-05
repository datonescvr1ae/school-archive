/*

    ZADANIE 1

*/
document.onload = alert("Dziekujemy za odwiedzenie strony!");

/*

    ZADANIE 2

*/
const zadanie2Text = document.getElementById("zadanie-2");
const originalSize = 20;

zadanie2Text.addEventListener("mouseover", () => {
    zadanie2Text.style.fontSize = originalSize + 20 + "px";
});

zadanie2Text.addEventListener("mouseleave", () => {
    zadanie2Text.style.fontSize = originalSize + "px";
});

/*

    ZADANIE 3

*/
const zadanie3Text = document.getElementById("zadanie-3");
const liczba = 4;

switch (liczba) {
    case 1:
        zadanie3Text.innerText = "<value> Poniedzialek"; break;

    case 2:
        zadanie3Text.innerText = "<value> Wtorek"; break;

    case 3:
        zadanie3Text.innerText = "<value> Sroda"; break;

    case 4:
        zadanie3Text.innerText = "<value> Czwartek"; break;

    case 5:
        zadanie3Text.innerText = "<value> Piatek"; break;

    case 6:
        zadanie3Text.innerText = "<value> Sobota"; break;

    case 7:
        zadanie3Text.innerText = "<value> Niedziela"; break;
}

/*

    ZADANIE 4

*/
const zadanie4Input1 = document.getElementById("zadanie-4-input-1");
const zadanie4Input2 = document.getElementById("zadanie-4-input-2");
const zadanie4Input3 = document.getElementById("zadanie-4-input-3");

const zadanie4Text = document.getElementById("zadanie-4");
const zadanie4Button = document.getElementById("zadanie-4-button");

function zadanie4Function(v1, v2, v3) {
    let largestNum = 0;
    const values = [v1, v2, v3];

    for (let i = 0; i <= 2; i++) {
        if (values[i] > largestNum) { largestNum = values[i]; }
    }

    zadanie4Text.innerHTML = "Najwieksza liczba: " + largestNum;
}

zadanie4Button.addEventListener("click", () => {
    const zadanie4Value1 = parseInt(zadanie4Input1.value);
    const zadanie4Value2 = parseInt(zadanie4Input2.value);
    const zadanie4Value3 = parseInt(zadanie4Input3.value);

    zadanie4Function(zadanie4Value1, zadanie4Value2, zadanie4Value3);
});

/*

    ZADANIE 5

*/
const zadanie5Text = document.getElementById("zadanie-5");

function trzy(z) {
    for (let i = 0; i <= z; i++) {
        if (i % 3 > 0) { zadanie5Text.innerHTML += i + " "; }
    }
}

trzy(100);

/*

    ZADANIE 6

*/
const zadanie6Button = document.getElementById("zadanie-6-button");

zadanie6Button.addEventListener("click", () => {
    alert("Witaj");
});

/*

    ZADANIE 7

*/
const zadanie7Img = document.getElementById("zadanie-7-img");

zadanie7Img.addEventListener("mouseover", () => {
    zadanie7Img.src = "gradient.jpg";
});

zadanie7Img.addEventListener("mouseleave", () => {
    zadanie7Img.src = "michal.jpg";
});

/*

    ZADANIE 8

*/
const zadanie8Input = document.getElementById("zadanie-8-input");
const zadanie8Button = document.getElementById("zadanie-8-button");

const zadanie8Wynik = document.getElementById("zadanie-8");

zadanie8Button.addEventListener("click", () => {
    const zadanie8Value = parseInt(zadanie8Input.value);

    if (zadanie8Value == 4) { zadanie8Wynik.innerHTML = "<br><br> <a href='tajemny.html'><img src='michal.jpg' width='100px' height='100px'></a> <br> gratulacje..."; }
});

/*

    ZADANIE 10

*/
const zadanie10Input = document.getElementById("zadanie-10-input");
const zadanie10Button = document.getElementById("zadanie-10-button");

const zadanie10Liczba = document.getElementById("zadanie-10-liczba");

const zadanie10Wynik = document.getElementById("zadanie-10");

zadanie10Button.addEventListener("click", () => {
    const zadanie10Value = zadanie10Input.value;
    
    if (zadanie10Value == parseInt(zadanie10Liczba.innerHTML).toString(2)) { zadanie10Wynik.innerHTML = "<a href='tajemny2.html'>nice...</a>"; }
});
