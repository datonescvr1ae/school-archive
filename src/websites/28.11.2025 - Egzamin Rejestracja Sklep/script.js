const clientButton = document.getElementById("client-button");
const addressButton = document.getElementById("address-button");
const contactButton = document.getElementById("contact-button");

const inputArray = document.getElementsByTagName("input");
const progressBar = document.getElementById("progress-bar");

let progressBarWidth = 4;

const confirmButton = document.getElementById("confirm-button");

function onBlockButtonClicked(sectionId) {
    for (let i = 1; i <= 3; i++) {
        document.getElementById("section-" + i).style.display = "none";
    }

    document.getElementById("section-" + sectionId).style.display = "block";
}

function onInputFocusLost() {
    progressBarWidth += 12;
    if (progressBarWidth > 100) { progressBarWidth = 100 }

    progressBar.style.width = progressBarWidth + "%";
}

function onConfirmButtonClicked() {
    for (let i = 0; i < inputArray.length; i++) {
        if (inputArray[i].type != "button") { console.log(inputArray[i].value); }
    }
}

clientButton.addEventListener("click", () => { onBlockButtonClicked(1); });
addressButton.addEventListener("click", () => { onBlockButtonClicked(2); });
contactButton.addEventListener("click", () => { onBlockButtonClicked(3); });

for (let i = 0; i < inputArray.length; i++) {
    inputArray[i].addEventListener("focusout", () => { onInputFocusLost(); });
}

confirmButton.addEventListener("click", () => { onConfirmButtonClicked(); });
