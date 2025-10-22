const resultDiv = document.getElementById("result");
const cookies = document.cookie;
let visits = 0;

if (cookies != "") {
    visits = parseInt(cookies.split("=")[1]);
}

document.cookie = `visits=${visits + 1}`;
resultDiv.innerHTML = visits + 1;
