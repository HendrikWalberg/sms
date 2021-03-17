const $ = jQuery;

$(document).ready(function() {
	questionToggle()
});

function questionToggle()
{
	$('.question .title').click(function() {
		$(this).parent().children('.answer').slideToggle("slow");
		$(this).children('.title i').toggleClass('fas fa-minus');
		$(this).children('.title i').toggleClass('fas fa-plus');
	});
}
