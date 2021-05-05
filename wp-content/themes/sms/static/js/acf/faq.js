$(document).ready(function() {
	$('.question .title').click(function() {
		$(this).parent().children('.answer').stop(true, false).slideToggle("slow");
		$(this).children('.title i').toggleClass('fas fa-angle-down fa-lg');
		$(this).children('.title i').toggleClass('fas fa-angle-up fa-lg');
	});
});