const $ = jQuery;
/*
$(document).ready(function() {
	questionToggle()
	indexList()
	siteHeader()
	getLenders()
	smoothScroll()
});

function questionToggle()
{
	$('.question .title').click(function() {
		$(this).parent().children('.answer').stop(true, false).slideToggle("slow");
		$(this).children('.title i').toggleClass('fas fa-angle-down fa-lg');
		$(this).children('.title i').toggleClass('fas fa-angle-up fa-lg');
	});
}

function getLenders()
{
	function htmlTemplate(data) {

		$.each(data, function(index, val) {

			if(val.timeUnit === "Month")
			{
				val.timeUnit = "månader";
			}

			if(val.timeUnit === "Year")
			{
				val.timeUnit = "år";
			}

			if(val.acceptsRemarks === "1") {
				var remarkToken = `<i class="fas fa-check"></i>`;
			};

			if(val.acceptsRemarks === "0") {
				var remarkToken = `<i class="fas fa-times"></i>`;
			};

			if(val.acceptsRemarks === null) {
				var remarkToken = `<i class="fas fa-question"></i>`;
			};

			if(val.ansok_utan_uc === "1") {
				var ucToken = `<i class="fas fa-check"></i>`;
			};

			if(val.ansok_utan_uc === "0") {
				var ucToken = `<i class="fas fa-times"></i>`;
			};

			if(val.ansok_utan_uc === null) {
				var ucToken = `<i class="fas fa-question"></i>`;
			};

			if(index > 3) {
				var programClass = "hide";
			}
			
			if(val.maxInterest === val.minInterest) {
				var interest = val.maxInterest
			} else {
				var interest = `${val.minInterest}-${val.maxInterest}`;
			}

			if(val.ansok_med_bankid === "1") {
				var bankToken = `<i class="fas fa-check"></i> Ja`;
			};

			if(val.ansok_med_bankid === "0") {
				var bankToken = `<i class="fas fa-times"></i> Nej`;
			};

			if(val.ansok_med_bankid === null) {
				var bankToken = `<i class="fas fa-question"></i>`;
			};

			$('.programs-area .programs').append(`
				<div class="program ${programClass === "hide" ? "hide" : ""} col-xl-12 col-lg-5 col-11 m-1">
					<div class="program-upper row m-1">
						<div class="image-container col-xl-2 col-10">
							<img src=${val.logoUrl}>
						</div>
						
						<div class="feature col-xl-3 col-lg-10">
							<p class="subtitle">Lånebelopp</p>
							<p>${val.minAmount} - ${val.maxAmount} kr</p>
						</div>
						
						<div class="feature col-xl-2 col-lg-10">
							<p class="subtitle">Ränta</p>
							<p>${interest}%</p>
						</div>
						
						<div class="feature col-xl-1 col-lg-10">
							<p class="subtitle">Åldersgräns</p>
							<p>${val.minAge}år</p>
						</div>

						<div class="feature extra col-xl-2 col-lg-10">
							<div class="col-xl-11 col-lg-6 p-0">
								<p>Bet.anmärk OK:</p>	
								<p>Utan UC:</p>
							</div>	
							<div class="col-xl-1 col-lg-1 p-0">
								<p id="remark-token" class="token">${remarkToken}</p>
								<p id="uc-token" class="token">${ucToken}</p>
							</div>
								
						</div>
						
						<div class="col-xl-2 col-lg-10">
							<div class="button-container col-12">
								<a rel="nofollow" target="_blank" href=${val.programUrl} class="primary-button"><span class="text">Ansök nu</span></a>
							</div>
						</div>
					</div>
					
					<div class="program-lower col-12">
						<button class="more-information">Mer Information <i class="fas fa-angle-down fa-lg"></i></button>

						<ul class="program-features">
							<li class="row justify-content-center">
								<div class="feature-name col-sm-6 col-12">Ansök utan UC:</div> 
								
								<div class="feature-value col-sm-6 col-12">
									${val.ansok_utan_uc === "1" ? `<i class="fas fa-check"></i> Ja` : `<i class="fas fa-times"></i> Nej`}
								</div>
							</li>

							<li class="row justify-content-center">
								<div class="feature-name col-sm-6 col-12">Uppläggningsavgift:</div>
							
								<div class="feature-value col-sm-6 col-12"> 
									${val.startFee} kr
								</div>
							</li>

							<li class="row justify-content-center">
								<div class="feature-name col-sm-6 col-12">Bet.anmärk OK:</div>
							
								<div class="feature-value col-sm-6 col-12"> 
									${remarkToken}
								</div>
							</li>

							<li class="row justify-content-center">
								<div class="feature-name col-sm-6 col-12">Lånetid:</div>
								
								<div class="feature-value col-sm-6 col-12"> 
									${val.minDuration} - ${val.maxDuration} ${val.timeUnit}
								</div>
							</li>

							<li class="row justify-content-center">
								<div class="feature-name col-sm-6 col-12">Expiditions Avgift:</div>
								
								<div class="feature-value col-sm-6 col-12"> 
									${val.adminFee} kr
								</div>
							</li>

							<li class="row justify-content-center">
								<div class="feature-name col-sm-6 col-12">Ansök med bankId:</div>
								
								<div class="feature-value col-sm-6 col-12"> 
									${bankToken}
								</div>
							</li>

							<li class="row justify-content-center">
								<div class="feature-name col-sm-6 col-12">Låneskydd kan tecknas:</div>
								
								<div class="feature-value col-sm-6 col-12"> 
									${val.laneskydd_kan_tecknas === "1" ? `<i class="fas fa-check"></i> Ja` : `<i class="fas fa-times"></i> Nej`}
								</div>
							</li>
							
							<li class="row justify-content-center">
								<div class="feature-name col-sm-6 col-12">Direkt utbetalning:</div>
								
								<div class="feature-value col-sm-6 col-12"> 
									${val.direktutbetalning === "1" ? `<i class="fas fa-check"></i> Ja` : `<i class="fas fa-times"></i> Nej`}
								</div>
							</li>

							<li class="row justify-content-center">
								<div class="feature-name col-sm-6 col-12">Exempel på lån:</div>
									
								<div class="feature-value col-sm-6 col-12"> 
									<p class="example">${val.loanExample}</p>
								</div>
							</li>

							<li class="row justify-content-center">
								<div class="col-12">
									<p class="warning">Du riskerar en betalningsanmärkning om du inte kan betala tillbaka hela skulden. Du kan vända dig till budget- och skuldrådgivaren i din kommun för stöd. Kontaktuppgifterna hittar du på <a href="http://www.hallakonsument.se">www.hallakonsument.se</a>.</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			`)})
			if($('.program').length > 3) {
				$('.programs-area .programs').append(`<div class="button-container col-12"><button class="show-all primary-button"><span class="text">Visa Alla</span></button></div>`);
			}
		
	};

	function getAll() {
		$('.programs-area .programs .program').remove();
		$('.programs-area .programs .button-container').remove();
		$.getJSON('http://sms/wp-json/adtraction-fetch/v1/get-all-programs', function( data ) {
			htmlTemplate(data);
		});
	}

	if( $('.programs-area').length)
	{
		getAll();
	}

	$('.programs-area .filter-area .reset-button').on('click', getAll);

	$(document).on('click', '.programs-area .programs .more-information', function() {
		$(this).next('.program-features').slideToggle(500);		
		$(this).html(($(this).html() == 'Mer Information <i class="fas fa-angle-down fa-lg"></i>') ? 'Visa Mindre <i class="fas fa-angle-up fa-lg"></i>' : 'Mer Information <i class="fas fa-angle-down fa-lg"></i>');		
	});

	$(document).on('click', '.programs-area .programs .show-all', function() {
		$('.hide').slideToggle('slow');
        $('.show-all .text').text(($('.show-all .text').text() == 'Visa Alla') ? 'Visa Mindre' : 'Visa Alla');
	});

	$(document).on('click', '.programs-area .filter-area .filter-button', function() {
		var uc;
		var remark;	

		if($('#uc').is(':checked')) {
			var uc = 1;
		} else {
			var uc = 0;
		}

		if($('#remark').is(':checked')) {
			var remark = 1;
		} else {
			var remark = 0;
		}

		$.getJSON(`http://sms/wp-json/adtraction-fetch/v1/get-filter-programs?uc=${uc}&remark=${remark}`, function( data ) {
			$('.programs-area .programs .program').remove();
			$('.programs-area .programs .button-container').remove();

			htmlTemplate(data);
		});
	});
}

function indexList() 
{
	var headings = [...document.querySelectorAll('index_list_el')];
	var i = 0;

	$('.index_list_el').each(function() {
		$(this).attr('id', `index-${i}`);
		headings[i] = $(this).text();
		i++;
	})

	$.each(headings, function(index, val) {
		$('.index-list #list').append(`
			<li class="col-lg-5 col-sm-12"><a href="#index-${index}">${val}</a></li>
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
}

function siteHeader() 
{		
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
			$('.nav-main-item').unbind();
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
}

function smoothScroll() {
	
	$('a[href*="#"]').on('click', function (e) {
		e.preventDefault()
	  
		$('html, body').animate(
		  {
			scrollTop: $($(this).attr('href')).offset().top-200,
		  },1000)
	})
}
*/