/*

    ZADANIE 9

*/
const zadanie9Input1 = document.getElementById("zadanie-9-input-1");
const zadanie9Input2 = document.getElementById("zadanie-9-input-2");

const zadanie9Button = document.getElementById("zadanie-9-button");

const zadanie9Text = document.getElementById("zadanie-9");

zadanie9Button.addEventListener("click", () => {
    const zadanie9Value1 = parseInt(zadanie9Input1.value);
    const zadanie9Value2 = parseInt(zadanie9Input2.value);

    zadanie9Text.innerHTML = "";

    if (zadanie9Value1 < zadanie9Value2) {
        for (let i = zadanie9Value1; i <= zadanie9Value2; i++) {
            zadanie9Text.innerHTML += i.toString() + " ";
        }
    } else if (zadanie9Value1 > zadanie9Value2) {
        for (let i = 0; i <= zadanie9Value1 - zadanie9Value2; i++) {
            const value = zadanie9Value1 - i;

            zadanie9Text.innerHTML += value.toString() + " ";
        }
    } else {
        zadanie9Text.innerHTML = zadanie9Value1;
    }
});
