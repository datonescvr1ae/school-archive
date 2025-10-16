const cytat1 = document.getElementById("cytat-1");
const cytat2 = document.getElementById("cytat-2");
const cytat3 = document.getElementById("cytat-3");

function onCytatClicked(id) {
    let nextId = id + 1
    if (nextId > 3) nextId = 1;

    const cytatToHide = document.getElementById(`cytat-${id}`);
    cytatToHide.setAttribute("class", "hidden-cytat");

    const cytatToShow = document.getElementById(`cytat-${nextId}`);
    cytatToShow.setAttribute("class", "");
}

cytat1.addEventListener("click", function() { onCytatClicked(1) });
cytat2.addEventListener("click", function() { onCytatClicked(2) });
cytat3.addEventListener("click", function() { onCytatClicked(3) });
