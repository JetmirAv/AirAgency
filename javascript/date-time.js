function date() {
    var date = new Date();
    var h = date.getHours();
    var m = date.getMinutes();
    var s = date.getSeconds();
    var r = date.getDate();
    var month = date.getMonth() + 1;
    var y = date.getFullYear();
    var d = document.getElementById("date");
    d.innerHTML = h + ":" + m + ":" + s + " &nbsp &nbsp &nbsp" + r + "/" + month + "/" + y;
}
setInterval(date, 500)
