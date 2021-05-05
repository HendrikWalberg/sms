$(document).ready(function() {
	var headings = [...document.querySelectorAll('index_list_el')];
	var i = 0;

	$('.index_list_el').each(function() {
		$(this).attr('id', i);
		headings[i] = $(this).text();
		i++;
	})

	$.each(headings, function(index, val) {
		$('.index-list #list').append(`
			<li class="col-lg-5 col-sm-12"><a href="#${index}">${val}</a></li>
		`);
	})

	$(window).resize(checkIndex);

	$(document).ready(checkIndex);

	$('.index-list .header .mobile-title').click(function() {
		$('.index-list #list').stop().slideToggle(500);
		$('.header').find('i').toggleClass('fas fa-angle-down fa-2x');
		$('.header').find('i').toggleClass('fas fa-angle-up fa-2x');
	});

	function checkIndex()
	{
		if($(window).outerWidth() > 992) {
			$('.index-list #list').attr('style', '');
			$('.header').find('i').toggleClass('fas fa-angle-down fa-2x');
			$('.header').find('i').toggleClass('fas fa-angle-up fa-2x');
		}
	}
});