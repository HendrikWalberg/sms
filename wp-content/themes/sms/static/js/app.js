const $ = jQuery;

$(document).ready(function() {
	questionToggle()
	indexList()
	siteHeader()
});

function questionToggle()
{
	$('.question .title').click(function() {
		$(this).parent().children('.answer').slideToggle("slow");
		$(this).children('.title i').toggleClass('fas fa-angle-down fa-lg');
		$(this).children('.title i').toggleClass('fas fa-angle-up fa-lg');
	});
}

function getLenders()
{
	$.getJSON(`https://api.adtraction.com/v2/public/compare/paydayloans/`, function( data ) {
		console.log(data);
	});
}

function indexList() 
{
	var headings = {};

	$('.scroll').each(function() {
		$(this).attr('id', $(this).text().replace(/\s+/g, '').toLowerCase());
		headings[$(this).text()] = $(this).attr('id');
	})

	$.each(headings, function(index, val) {
		$('.index-list .list').append(`
			<a class="col-lg-5 col-sm-12 m-1" href="#${val}"><i class="fas fa-arrow-circle-right"></i>${index}</a>
		`);
	})
}

function siteHeader() 
{
    $('#site-header .toggle-nav-drop').click(function() {
        $(this).next('.nav-drop').slideToggle(500);
    });

	var $window = $(window);

	$window.on('scroll', checkHeader);

	$window.on('scroll resize', checkHeader);

	$window.trigger('scroll');

	function checkHeader()
	{
		if($window.scrollTop() > 50) {
		$('#site-header').addClass('active');
		} else {
			$('#site-header').removeClass('active');
		}
	}

	$('#site-header-toggle').click(function() {
		$(this).toggleClass('active');
		$('#site-header').toggleClass('expand');
		$('.nav-main').slideToggle(0);
		$('.logo').toggleClass('active');
	});
}