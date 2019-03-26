var CURRENT_URL = window.location.href.split('#')[0].split('?')[0],
	$SIDEBAR_MENU = $('#sidebar-menu');

/* loading function */
function loadingShow(){
	$('.loading').show();
}
function loadingHide(){
	$('.loading').hide();
}

//count total json (obj)
function countProperties(obj) {
	var prop;
	var propCount = 0;

	for (prop in obj) {
		propCount++;
	}
	return propCount;
}

// submit modal function
function submitModal() {
	$('#defaultModal form').submit(function(event) {
		var url		 = $(this).attr('action');
		var options = {
			type: 'POST',
			data: $(this).serialize(),
			dataType: 'json',
			success: function(response, textStatus, jqXHR) {
				if(countProperties(response) > 0) {
					$('form[action="'+url+'"] .form-group').removeClass('has-error');
					$('form[action="'+url+'"] .form-group .help-block').html('');
					for(i in response) {
						$('form[action="'+url+'"] .field-' + i ).addClass('has-error');
						$('form[action="'+url+'"] .field-' + i + ' .help-block').html(response[i][0]);
					}
				}
			},
			complete: function(jqXHR, textStatus) {
				var redirect = jqXHR.getResponseHeader('X-Redirect');
				if(redirect != null)
					location.href = redirect;
			}
		}
		$.ajax(url, options);
		event.preventDefault();
	});
}

$(document).ready(function () {
	$SIDEBAR_MENU.find('li').removeClass('current-page');

	/* dialog load */
	$(document).on('click', '.modal-btn:not("[data-target]")', function (event) {
		loadingShow();
		var link = $(this).attr('href');
		$('#defaultModal .modal-body').load(link, function () {
			loadingHide();
			$('#defaultModal').modal({
				show: true,
			});
			submitModal();
		});
		event.preventDefault();
	});
});