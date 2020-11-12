var CURRENT_URL = window.location.href.split('#')[0].split('?')[0],
	$SIDEBAR_MENU = $('#sidebar-menu')
	HINT_TOOLTIP = $('form.hint-tooltip');

/* loading function */
function loadingShow() {
	$('.loading').show();
}
function loadingHide() {
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

function initHintBlocks() {
	$('.hint-block').each(function () {
		var $hint = $(this);
		$hint.parents('.form-group').find('label').addClass('help').popover({
			html: true,
			trigger: 'hover',
			placement: 'right',
			content: $hint.html()
		});
	});
};

// submit modal function
function submitModal() {
	var submit = false;
	$('#defaultModal form').on('submit', function(event) {
		var onPost = $(this).attr('onpost');
		if(typeof(onPost) == 'undefined')
			event.preventDefault();
		var url = $(this).attr('action');
		var options = {
			type: 'POST',
			data: $(this).serialize(),
			dataType: 'json',
			beforeSend: function(jqXHR) {
				submit = true;
			},
			success: function(response, textStatus, jqXHR) {
				submit = false;
				if (typeof(response.error) != 'undefined') {
					if(response.error == 0) {
						var $modalForm = $('form[action="'+url+'"]').parents('.modal-body');
						if($modalForm.length > 0)
							$modalForm.html(response.message);
					}
					return false;

				} else {
					if(response.redirect != null)
						location.href = response.redirect;
					else if(response.reload != null)
						location.reload();
					else {
						if(countProperties(response) > 0) {
							$('form[action="'+url+'"] .form-group').removeClass('has-error');
							$('form[action="'+url+'"] .form-group .help-block').html('');
							for(i in response) {
								$('form[action="'+url+'"] .field-' + i ).addClass('has-error');
								$('form[action="'+url+'"] .field-' + i + ' .help-block').html(response[i][0]);
							}
						}
					}
					return false;
				}
			},
			complete: function(jqXHR, textStatus) {
				var redirect = jqXHR.getResponseHeader('X-Redirect');
				if(redirect != null)
					location.href = redirect;
			}
		}
        if(submit == false)
            $.ajax(url, options);
        event.preventDefault();
	});
}

$(document).ready(function () {
	$SIDEBAR_MENU.find('li').removeClass('current-page');

	if(HINT_TOOLTIP.length > 0)
		initHintBlocks();

	/* dialog load */
	$(document).on('click', '.modal-btn:not("[data-target]")', function (event) {
		event.preventDefault();
		loadingShow();
		var link = $(this).attr('href');
		$('#defaultModal .modal-content').load(link, function (event) {
			loadingHide();
			$('#defaultModal').modal({
				show: true,
			});
			submitModal();
		});
	});
	$('#defaultModal').on('hidden.bs.modal', function (event) {
		$(this).find('.modal-content').html('');
	});
});