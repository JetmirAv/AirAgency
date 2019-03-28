 /*-----------------------------------------------------------------------------
                     Add To Cart
 -----------------------------------------------------------------------------*/
 var count = 0;
 var addToCart = document.getElementsByClassName('addToCart');
 for (var i = 0; i < addToCart.length; i++) {
 	addToCart[i].onclick = function (e) {
 		if (sessionStorage.clickcount) {
 			sessionStorage.clickcount = Number(sessionStorage.clickcount) + 1;
 			document.getElementById(this.id).disabled = true;

 		} else {
 			sessionStorage.clickcount = 1;

 		}
 		document.getElementById("cart-icon").style.display = "block";
 		document.getElementById("cart-items").innerHTML = sessionStorage.clickcount;
 		document.getElementById(this.id).innerHTML = "Added";
 	}
 }
