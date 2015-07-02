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
				FB.getLoginStatus(function(response) {
					
					if (response.status === 'connected') {
						console.log('Logged in.');
						FB.api('/me?fields=first_name', function(data) {
							var welcomeBlock = document.getElementById('fb-welcome');
							welcomeBlock.innerHTML = 'Welcome, ' + data.first_name + '!';
						});
					}
					else {
						console.log('Not Logged in.');
						FB.login();
					}
				});
			
				FB.login(function(){
					FB.api("/422533704443771/comments/?fields=message",
						function (response) {
							var temp="sample";
							if (response && !response.error) {
								for (var i = response.data.length - 1; i >= 0; i--) {
									console.log(response.data[i].message+"\n");
									var message = document.createElement("pre");
									message.innerHTML = response.data[i].message;
									document.getElementById("content").appendChild(message);
								};
								temp=response.paging.next;
							}
							else {
								console.log("Some kinda error in response!");
							};
							if (temp!=null) {
								FB.api( temp.substring(31) ,
									function(response){
										for (var i = response.data.length - 1; i >= 0; i--) {
											console.log(response.data[i].message+"\n");
											var message = document.createElement("pre");
											message.innerHTML = response.data[i].message;
											document.getElementById("content").appendChild(message);
										};
										temp = response.paging.next;
										console.log(count+"times");
									}
								);
							};
						}
					);
				}, {scope: 'read_mailbox'});
				  /*FB.login(function(){
				  console.log("Getting posts on wall");
				  FB.api('me/feed?limit=150', function(response) {
				    var posts = response.data;
				    var birthdayPosts = $.grep(posts, function(post, i) {
				      try {
				        if (post.message && post.to && post.to.data && post.to.data.length > 0 && post.to.data[post.to.data.length - 1].id === 100001079124443 && post.from.id !== 100001079124443) {
				          var from = post.from.name;
				          var log = false;
				          var message = post.message;
				          if (log) console.log("Processing message: '", message.toLowerCase(), "' from", from); 
				          var filters = ['happy','birthday','bday','feliz','wishes', 'hbty', 'hbd', 'great day','wonderful day', 'awesome day', 'fantastic day'];
				          for(var j = 0; j<filters.length; j++) {
				            var filter = filters[j];
				            if (log) {console.log("Processing filter:", filter)}
				            if (log) {console.log("indexOf:", message.toLowerCase().indexOf(filter))}  
				            if (message.toLowerCase().indexOf(filter) > -1) {
				              //finalPostMap[post.id] = post;
				              return true;
				            }
				          }
				          console.log("Discarding message: '", message, "' from", from);
				        }
				        return false;
				      } catch (err) {
				        console.log("An error occured whilst processing post",post,":", err);
				        return false;
				      }
				    });
				    console.log("Got",birthdayPosts.length, 'birthday posts from a total of', posts.length,'posts');
				    //callback(birthdayPosts);
				  });
				}, {scope: 'read_stream'});*/

			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		}
		</script>
		<div id="content"></div>
	</body>
</html>