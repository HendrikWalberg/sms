const $ = jQuery;

$(document).ready(function() {
	questionToggle()
	indexList()
	siteHeader()
	getLenders()
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
				var acceptToken = `<i class="fas fa-check"></i>`;
			};

			if(val.acceptsRemarks === "0") {
				var acceptToken = `<i class="fas fa-times"></i>`;
			};

			if(val.ansok_utan_uc === "1") {
				var remarkToken = `<i class="fas fa-check"></i>`;
			};

			if(val.ansok_utan_uc === "0") {
				var remarkToken = `<i class="fas fa-times"></i>`;
			};

			if(index > 3) {
				var programClass = "hide";
			}
			
			if(val.maxInterest === val.minInterest) {
				var interest = val.maxInterest
			} else {
				var interest = `${val.minInterest}-${val.maxInterest}`;
			}

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
								<p class="token">${remarkToken}</p>
								<p class="token">${acceptToken}</p>
							</div>
								
						</div>
						
						<div class="col-xl-2 col-lg-10">
							<div class="button-container col-12">
								<a href=${val.programUrl} class="primary-button"><span class="text">Ansök nu</span></a>
							</div>
						</div>
					</div>
					
					<div class="program-lower col-12">
						<button class="more-information">Mer Information</button>

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
									${val.acceptsRemarks === "1" ? `<i class="fas fa-check"></i> Ja` : `<i class="fas fa-times"></i> Nej`}
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
									${val.ansok_med_bankid === "1" ? `<i class="fas fa-check"></i> Ja` : `<i class="fas fa-times"></i> Nej`}
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

	$('.programs-area .filter-area .filter .reset-button').on('click', getAll);

	$(document).on('click', '.programs-area .programs .more-information', function() {
		$(this).next('.program-features').slideToggle(500);		
		$(this).text(($(this).text() == 'Mer Information') ? 'Visa Mindre' : 'Mer Information');		
	});

	$(document).on('click', '.programs-area .programs .show-all', function() {
		$('.hide').slideToggle('slow');
        $('.show-all .text').text(($('.show-all .text').text() == 'Visa Alla') ? 'Visa Mindre' : 'Visa Alla');
	});

	$(document).on('click', '.programs-area .filter-button', function() {
		var uc;
		var remark;

		if($('.programs-area .filter #uc').is(':checked')) {
			var uc = 1;
		} else {
			var uc = 0;
		}

		if($('.programs-area .filter #remark').is(':checked')) {
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
	var headings = {};

	$('.scroll').each(function() {
		$(this).attr('id', $(this).text().replace(/\s+/g, '').toLowerCase());
		headings[$(this).text()] = $(this).attr('id');
	})

	$.each(headings, function(index, val) {
		$('.index-list .list').append(`
			<li class="col-lg-5 col-sm-12"><a href="#${val}">${index}</a></li>
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