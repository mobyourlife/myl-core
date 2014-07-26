$('#radioBtn a').on('click', function() {
    var sel = $(this).data('value');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-value="'+sel+'"]').removeClass('btn-primary').addClass('btn-default');
    $('a[data-toggle="'+tog+'"][data-value="'+sel+'"]').removeClass('btn-default').addClass('btn-primary');
	
	if (tog == "account_type")
	{
		if (sel == "profile")
		{
			$('#select_account_id').fadeOut("fast");
		}
		else
		{
			$('#select_account_id').fadeIn("fast");
		}
	}
});

$('#subdomain').keyup(function() {
	$('#subdomain-status').hide();
});

$('#register-form').submit(function() {
	if ($('#subdomain').val().length == 0) {
			$('#subdomain-status strong').html('Escolha um subdomínio.');
			$('#subdomain-status').show();
			return false;
	}
	
	var jqxhr = $.post("./consultar-subdominio", { 'nome': $('#subdomain').val() }, function(data) {
		if (data.status == true) {
			$('#subdomain-status strong').html('Subdomínio indisponível!');
			$('#subdomain-status').show();
			return false;
		}
	});
});
