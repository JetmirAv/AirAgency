/*-----------------------------------------------------------------------------
                            Service Tabs
    -----------------------------------------------------------------------------*/
var element1 = document.getElementById("title1");
var element2 = document.getElementById("title2");
var element3 = document.getElementById("title3");
var element11 = document.getElementById("see-offers-flights");
var element22 = document.getElementById("see-offers-cars");
var element33 = document.getElementById("see-offers-hotels");

function Flights() {
    document.getElementById("serv-flights").style.display = "block";
    document.getElementById("serv-cars").style.display = "none";
    document.getElementById("serv-hotels").style.display = "none";
    document.getElementById("see-more1").style.display = "none";
    document.getElementById("bttn-see-more1").style.display = "block";
    element1.style.backgroundColor = "rgba(226, 226, 226, 0.74)"
    element2.style.backgroundColor = "transparent"
    element3.style.backgroundColor = "transparent"
}

function Cars() {
    document.getElementById("serv-flights").style.display = "none";
    document.getElementById("serv-cars").style.display = "block";
    document.getElementById("serv-hotels").style.display = "none";
    document.getElementById("see-more2").style.display = "none";
    document.getElementById("bttn-see-more2").style.display = "block";
    element2.style.backgroundColor = "rgba(226, 226, 226, 0.74)"
    element3.style.backgroundColor = "transparent"
    element1.style.backgroundColor = "transparent"
}


function Hotels() {
    document.getElementById("serv-flights").style.display = "none";
    document.getElementById("serv-cars").style.display = "none";
    document.getElementById("serv-hotels").style.display = "block";
    document.getElementById("see-more3").style.display = "none";
    document.getElementById("bttn-see-more3").style.display = "block";
    element3.style.backgroundColor = "rgba(226, 226, 226, 0.74)"
    element1.style.backgroundColor = "transparent"
    element2.style.backgroundColor = "transparent"
}

document.getElementById("bttn-see-more1").onclick = function () {
    document.getElementById("see-more1").style.display = "block";
    document.getElementById("bttn-see-more1").style.display = "none";
}

document.getElementById("bttn-see-more2").onclick = function () {
    document.getElementById("see-more2").style.display = "block";
    document.getElementById("bttn-see-more2").style.display = "none";
}

document.getElementById("bttn-see-more3").onclick = function () {
    document.getElementById("see-more3").style.display = "block";
    document.getElementById("bttn-see-more3").style.display = "none";
}

element1.addEventListener('click', Flights);
element11.addEventListener('click', Flights);
element2.addEventListener('click', Cars);
element22.addEventListener('click', Cars);
element3.addEventListener('click', Hotels);
element33.addEventListener('click', Hotels);
