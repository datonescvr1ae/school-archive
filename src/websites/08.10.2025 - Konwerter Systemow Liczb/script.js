const convertButton = document.getElementById("convert");
const pResult = document.getElementById("result");

const regExpLookup = {
    2: /[0-1]/g,
    4: /[0-3]/g,
    8: /[0-7]/g,
    10: /[0-9]/g,
    16: /[0-9, A-F]/g
}

function onConvertClicked() {
    const num = document.getElementById("num").value;

    if (num != "") {
        const sysFrom = document.getElementById("sys-from").value;
        const sysTo = document.getElementById("sys-to").value;

        if (regExpLookup[sysFrom].test(num)) {
            const numDecimal = parseInt(num, sysFrom);

            pResult.innerHTML = `Wynik: ${numDecimal.toString(sysTo)} (system ${sysTo})`;
        } else {
            pResult.innerHTML = `<span style='color: red'>Liczba nie jest w systemie ${sysFrom}!</span>`
        }
    } else {
        pResult.innerHTML = "<span style='color: red'>Musisz podac liczbe!</span>"
    }
}

convertButton.addEventListener("click", onConvertClicked);
