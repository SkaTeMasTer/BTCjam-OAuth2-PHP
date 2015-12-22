<?php
// ------------------------------------------------------------------------------------
// | BTCjam-OAuth2-PHP
// ------------------------------------------------------------------------------------
// | + SOURCE CODE: https://github.com/SkaTeMasTer/BTCjam-OAuth2-PHP/
// | + Written by: Shawn Reimerdes (Leech Software)
// ------------------------------------------------------------------------------------

// debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('config.php');
require_once('http_client.class.php');

if (isset($_SESSION) && !empty($_SESSION['access_token'])) {

        	$accessToken = $_SESSION['access_token'];

} else {

			 /* no valid access token available, go to authorization server */
				   
			 //header('HTTP/1.1 302 Found');
			 header('Location: '. $apiConfig['authorizationUrlBase']);
			 exit;
				//	die("<p>Sorry, no access token found or our SESSION has expired.</p>\n");

}





// OAuth2 authorized requests must send the 'access_token' via a 
// modified HTTP header w/ Authorization Bearer Token. The protocol
// outlines this security method instead of a QUERY POST, 
// in order to protect our tokens from plain-text and browsers 

// *** The OAuth2 dance is complete.  We can now make calls to the API.

// -------------------------------------------------------------------------------------------

	// * Endpoint: [GET] /api/v1/me

 	// try {

			$httpClient = new HttpClient();

			$headers = array('Authorization: Bearer ' . $accessToken);

			$response = $httpClient->getData($apiConfig['userprofileUrlBase'], $headers);
			
			$responseArray = json_decode($response, TRUE);
	
	// catch () {}	

 	//var_dump($responseArray);


	// *** 'User Profile' Endpoint 


	echo "<p>[*] 'User Profile' Endpoint / using Scope(s): basic_profile, extended_profile ...</p>" . PHP_EOL;
	

	
?>
<hr>

<h1>Hi, <?=$responseArray['user']['name'];?></h1>
<img src='<?=$responseArray['user']['avatar_url'];?>' width="75px" height="75px" />

<p>You are currently logged on.</p>

<p>Your Balance = <?=$responseArray['user']['balance'];?> BTC</p>

<hr>

<?




?>
