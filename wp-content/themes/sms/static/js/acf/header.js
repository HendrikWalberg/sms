$(document).ready(function() {
	$(window).scroll(checkHeader);

	$(window).resize(checkHeader);

	$(document).ready(checkHeader);

	function checkHeader()
	{
		if($(window).scrollTop() > 1) {
		$('#site-header').css('top', '0');
		} else {
			$('#site-header').css('top', '20px');
		}

		if($(window).width() > 992) {
			$('.nav-main-item').hover(function() {
				$(this).children('.nav-drop').stop().fadeToggle(200);
				$(this).find('i').toggleClass('fas fa-angle-down fa-lg');
				$(this).find('i').toggleClass('fas fa-angle-up fa-lg');
			});
		} else {
			$('.nav-main-item').unbind();
			$('.nav-main-item').click(function() {
				$(this).children('.nav-drop').stop().fadeToggle(200);
				$(this).find('i').toggleClass('fas fa-angle-down fa-lg');
				$(this).find('i').toggleClass('fas fa-angle-up fa-lg');
			});
		}
	}

	$('#site-header-toggle').click(function() {
		$('.nav-menu').toggleClass('expand');
		$(this).find('i').toggleClass('fas fa-bars fa-2x');
		$(this).find('i').toggleClass('far fa-times-circle fa-2x');
		$('#fade-filter').toggleClass('fade');
		$('.logo').slideToggle(0);
		$('.index-list').slideToggle(0);
	});

	$('#fade-filter').click(function() {
		$('.nav-menu').toggleClass('expand');
		$('#site-header-toggle').find('i').toggleClass('fas fa-bars fa-2x');
		$('#site-header-toggle').find('i').toggleClass('far fa-times-circle fa-2x');
		$('#fade-filter').toggleClass('fade');
		$('.logo').slideToggle(0);
		$('.index-list').slideToggle(0);
	});
});