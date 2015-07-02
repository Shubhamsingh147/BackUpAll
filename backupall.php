<html>
	<title>
		Backup'emAll
	</title>
	<head>
		Backup All
	</head>
	<body>
		<h1 id="fb-welcome"></h1>
		<script>
			window.fbAsyncInit = function() {
				FB.init({
					appId      : '414707712029053',
					xfbml      : false,
					status	   : true,
					version    : 'v2.2'
				});
				FB.ui({
					method: 'share_open_graph',
					action_type: 'og.likes',
					action_properties: JSON.stringify({
						object:'https://developers.facebook.com/docs/',
					})
				}, function(response){});
				FB.getLoginStatus(function(response) {
					if (response.status === 'connected') {
						console.log('Logged in.');
						FB.api('/me?fields=first_name', function(data) {
							var welcomeBlock = document.getElementById('fb-welcome');
							welcomeBlock.innerHTML = 'Welcome, ' + data.first_name + '!';
						});
					}
					else {
						FB.login();
					}
				});
				FB.login(function(){
					FB.api('/me/feed', 'post', {message: 'Worked!'});
				}, {scope: 'publish_actions'});
			};

			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<div
			class="fb-like"
			data-send="true"
			data-width="450"
			data-show-faces="true">
		</div>
	</body>