   var vHeight = $(window).height(),
       vWidth = $(window).width(),
       cover = $('#box'),
       body = $('body');
   cover.css({
       "max-width": "100%",
       "height": vHeight - ((vHeight / 100) * 40)

   });
   body.css({
       "max-width": vWidth - (vWidth / 10)
   });

   var wrapper = document.getElementsByClassName("wrapper");
   var info = document.getElementsByClassName("info");

   function Event1() {
       document.getElementById("title2").classList.remove("active");
       document.getElementById("title1").classList.add("active");
       document.getElementById("title").classList.remove("title-move");
       wrapper[0].classList.remove("wrapper-move");
       wrapper[1].classList.remove("wrapper-move");
       wrapper[1].classList.remove("activated");
       document.getElementById("info").classList.remove("info-move");
       setTimeout(function () {
           document.getElementById("sign-in").classList.add("activated");
           document.getElementById("sign-in").classList.remove("deactive");
           document.getElementById("sign-up").classList.remove("activated");
           document.getElementById("sign-up").classList.add("deactive");

       }, 300);
       setTimeout(function () {
           wrapper[0].classList.add("activated");
       }, 900);
   };

   function Event2() {
       document.getElementById("title1").classList.remove("active");
       document.getElementById("title2").classList.add("active");
       document.getElementById("title").classList.add("title-move");
       wrapper[0].classList.add("wrapper-move");
       wrapper[0].classList.remove("activated");
       wrapper[1].classList.add("wrapper-move");
       document.getElementById("info").classList.add("info-move");
       setTimeout(function () {
           document.getElementById("sign-up").classList.add("activated");
           document.getElementById("sign-up").classList.remove("deactive");
           document.getElementById("sign-in").classList.remove("activated");
           document.getElementById("sign-in").classList.add("deactive");
       }, 300);
       setTimeout(function () {
           wrapper[1].classList.add("activated");
       }, 900);
   };

   document.getElementById("title1").addEventListener('click', Event1);
   document.getElementById("title2").addEventListener('click', Event2);
