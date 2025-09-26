const zastosujButton = document.getElementById("zastosuj");
const neon = document.getElementById("neon");

const redRange = document.getElementById("red-range");
const greenRange = document.getElementById("green-range");
const blueRange = document.getElementById("blue-range");

const rozmiarInput = document.getElementById("rozmiar");

function onZastosujClicked() {
    const trescNeonu = document.getElementById("tresc").value;
    neon.innerHTML = trescNeonu;
}

function onRangeValueChanged() {
    neon.style.color = `rgb(${redRange.value}, ${greenRange.value}, ${blueRange.value})`;
}

function onRozmiarChanged() {
    neon.style.fontSize = `${rozmiarInput.value}px`;
}

zastosujButton.addEventListener("click", onZastosujClicked);

redRange.addEventListener("change", onRangeValueChanged);
greenRange.addEventListener("change", onRangeValueChanged);
blueRange.addEventListener("change", onRangeValueChanged);

rozmiarInput.addEventListener("change", onRozmiarChanged);
