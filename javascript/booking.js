
var number = 1;
showImages(number);

function plusphotos(n) {
	showImages(number += n);
}

function currentPhoto(n) {
	showImages(number = n);
}

function showImages(n) {
	var i;
	var photos = document.getElementsByClassName("photos");
	var small = document.getElementsByClassName("small-photo");
	if (n > photos.length) {
		number = 1;
	}
	if (n < 1) {
		number = photos.length;
	}
	for (i = 0; i < photos.length; i++) {
		photos[i].style.display = "none";
	}
	for (i = 0; i < small.length; i++) {
		small[i].className = small[i].className.replace(" active", "");
	}
	photos[number - 1].style.display = "block";
	small[number - 1].className += " active";
}
