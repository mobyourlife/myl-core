window.fbAsyncInit = function() {
	FB.init({
		appId      : '675062689245409',
		cookie     : true,
		xfbml      : true,
		oauth      : true,
		version    : 'v2.0'
	});
	
	FB.Event.subscribe('auth.login', function(response) {
		window.location.reload();
	});
	
	FB.Event.subscribe('auth.logout', function(response) {
		window.location.reload();
	});
}
