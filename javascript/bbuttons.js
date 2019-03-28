$(document).ready(function () {
	$("#btn1").click(function () {
		$("#Showmore").hide("Show less");
	});
	$("#btn1").click(function () {
		$("#Showmore").show();
	});
	$("#btn1").click(function () {
		$("#btn1").text($("#btn1").text() === 'Show more' ? 'Show less' : 'Show more');
	});

	$("#btn2").click(function () {
		$(".showmore1").hide("Show less");
	});
	$("#btn2").click(function () {
		$(".showmore1").show();
	});
	$("#btn2").click(function () {
		$("#btn2").text($("#btn2").text() === 'Show more' ? 'Show less' : 'Show more');
	});
});
