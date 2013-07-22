$(document).ready(function(){
	$("#about").click(function(){
		$(".about").fadeIn("fast");
		$(".contact, .poll, .results").hide();
	});

	$("#contact").click(function(){
		$(".contact").fadeIn("fast");
		$(".about, .poll, .results").hide();
	});

	$("#poll").click(function(){
		$(".poll").fadeIn("fast");
		$(".about, .contact, .results").hide();
	});

	$("#results").click(function(){
		$(".results").fadeIn("fast");
		$(".about, .poll, .contact").hide();
	});



});