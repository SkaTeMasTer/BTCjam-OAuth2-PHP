<?php
// ------------------------------------------------------------------------------------
// | BTCjam-OAuth2-PHP
// ------------------------------------------------------------------------------------
// | + SOURCE CODE: https://github.com/SkaTeMasTer/BTCjam-OAuth2-PHP/
// | + Written by: Shawn Reimerdes (Leech Software)
// ------------------------------------------------------------------------------------

session_start();

require_once('config.php');

$_SESSION['state'] = rand(0,999999999);



$queryParams = array(
					 'client_id' => $apiConfig['oauth2_client_id'],  // '<client_id>' = provided to you when you registered your application
					 'redirect_uri' => $apiConfig['oauth2_redirectUriPath'],			// '<redirect_url>' = location user returns to after they approve access for your app
					 'scope' => $apiConfig['scope'],  				// '<scopes>' = access permission data scope names. (list of space-delimited strings!)
					 'response_type' => 'code',						// 'code' =  using server-side Web Application flow, ask for authorization code 
					 'state' => $_SESSION['state'], 			 	// '<random num>' = client security measure to mitigate cross-site request forgery (CSRF)
		 			 'approval_prompt' => 'auto',			    	// 'force' = always request user consent
					 'access_type' => 'offline'						// 'offline' = app needs access to user data while the user is away from keyboard (AFK) ;)
					);

$goToUrl = $apiConfig['authorizationUrlBase'] . '?' . http_build_query($queryParams);


// Output a webpage enticing users to click a "Start" button which connects to the OAuth2 API endpoint "Authorize"

?>

<div style="padding:80px;vertical-align:middle;align:center;background:lightgrey;width:400px;font-family:Verdana">

<img src="http://cdn.auth0.com/samples/auth0_logo_final_blue_RGB.png" width="200" height="49"/>

<h1>BTCjam-OAuth2-PHP</h1><h2>"My Test App"</h2><br />

<h3>Please click the 'start' button to begin the OAuth2 dance.</h3><br /><br />

<p>You will be temporarily redirected to btcjam.com's web site to authorize your access...</p><br /><br /> 

<form name="oauthpage" method="get">
<input type="button" onClick="return window.location='<?=$goToUrl;?>';" value="-- START HERE: Authorize --" style="background: #96cff5;background-image: -webkit-linear-gradient(top, #96cff5, #2980b9);background-image: -moz-linear-gradient(top, #96cff5, #2980b9);background-image: -ms-linear-gradient(top, #96cff5, #2980b9);background-image: -o-linear-gradient(top, #96cff5, #2980b9);background-image: linear-gradient(to bottom, #96cff5, #2980b9);-webkit-border-radius: 20;-moz-border-radius: 20;border-radius: 20px;font-family: Arial;color: #ffffff;font-size: 23px;padding: 10px 20px 10px 20px;text-decoration: none;"/>
</form>

</div>

<br />
<hr>
<div style="padding:60px;font-size:9pt;font-family:Verdana">
<a href="https://btcjam.com/oauth/applications">Where are my API keys?</a> |
<a href="https://btcjam.com/faq/api">BTCjam API FAQ</a> |
<a href="https://github.com/SkaTeMasTer/BTCjam-OAuth2-PHP">Git Repo: <?=$apiConfig['app_name'];?> v<?=$apiConfig['app_version'];?></a> 
</div>


 
