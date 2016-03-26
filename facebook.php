<html>
<head>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css" />
  <title>jQuery Example</title>
  <script>

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1719839291584651',
      xfbml      : true,
      version    : 'v2.5'
    });

    FB.login(function(){
  // Note: The call will only work if you accept the permission request
  FB.api('/me/feed', 'post', {message: 'Hello, world!'});
}, {scope: 'publish_actions'});

 		
 	FB.ui({
	 	 method: 'feed',
	  	link: 'http://www.mauro-facebook.com.br',
	  	caption: 'An example caption',
	}, function(response){});

		FB.getLoginStatus(function(response) {
	  if (response.status === 'connected') {
	    console.log('Logged in.');
	  }
	  else {
	    FB.login();
	  }
});


  };


  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  function checkLoginState()
{
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            // usuario logado no facebook e com o app aceito
 
        } else if (response.status === 'not_authorized') {
            // Usuario logado no facebook, mas nao aceitou o App
        } else {
            // Usuario nao logado no facebook
        }
    });
}

</script>

</head>

	<BODY>
		
		<div
		  class="fb-like"
		  data-share="true"
		  data-width="450"
		  data-show-faces="true">
		</div>

		<fb:login-button
    		 scope="email,publish_actions" onlogin="checkLoginState();">
		</fb:login-button>



	</BODY>

</html>