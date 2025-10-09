const sendButton = document.getElementById("send");
const generateButton = document.getElementById("generate-message");

const responses = [
    "Świetnie!",
    "Kto gra główną rolę?",
    "Lubisz filmy Tego reżysera?",
    "Będę 10 minut wcześniej",
    "Może kupimy sobie popcorn?",
    "Ja wolę Colę",
    "Zaproszę jeszcze Grześka",
    "Tydzień temu też byłem w kinie na Diunie",
    "Ja funduję bilety"
]

function sendMessage(id, message) {
    const chatBlock = document.getElementById("chat-block");

    const chatSection = document.createElement("section");
    chatBlock.appendChild(chatSection);

    if (id == 1) {
        chatSection.className = "wypowiedz jolanta";
        chatSection.innerHTML = `<img src='Jolka.jpg' alt='Profilowe Jolki'> ${message}`;
    } else {
        chatSection.className = "wypowiedz krzysiek";
        chatSection.innerHTML = `${message} <img src='Krzysiek.jpg' alt='Profilowe Jolki'>`;
    }

    chatSection.scrollIntoView()
}

function onSendClicked() {
    const message = document.getElementById("message").value;

    sendMessage(1, message);
}

function onGenerateClicked() {
    const randNum = Math.round(Math.random() * (responses.length - 1));
    const message = responses[randNum];

    sendMessage(2, message);
}

sendButton.addEventListener("click", onSendClicked);
generateButton.addEventListener("click", onGenerateClicked);
