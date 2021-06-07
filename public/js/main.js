let frontElt = document.getElementById('front');
let switchElt = document.getElementById('switch');
let cardElt = document.getElementById('cardType');
let stat = "red";


switchElt.addEventListener('click', function() {
    if (stat == "red") {
        frontElt.style.background = '#D61F06';
        stat = "green";
        cardElt.innerHTML = "Negative";

    } else if (stat == "green") {
        frontElt.style.background = '#06D6A0';
        stat = "red";
        cardElt.innerHTML = "Positive"
    }
});