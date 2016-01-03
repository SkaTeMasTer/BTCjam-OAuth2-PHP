<?php
// ------------------------------------------------------------------------------------
// | BTCjam-OAuth2-PHP
// ------------------------------------------------------------------------------------
// | + SOURCE CODE: https://github.com/SkaTeMasTer/BTCjam-OAuth2-PHP/
// | + Written by: Shawn Reimerdes (Leech Software)
// ------------------------------------------------------------------------------------

// debug
ini_set('display_errors', 1); error_reporting(E_ALL);

// todo: obviously this is just a demo, bad coding here... needs to be seperated into a new class, etc...
// there is just a single API call in the demo here...


session_start();

require_once('config.php');
require_once('http_client.class.php');


$cache_filename = '/tmp/php_session_btcjam.txt'; // ensure this file/dir has write permissions!!!

if (isset($_SESSION) && !empty($_SESSION['access_token'])) {


        			  $accessToken = $_SESSION['access_token'];
        	
        	 		  // *** new session started -- cache session to local file (prevents needing to reauthorize your app)

					  echo "<p>[*] Creating file to cache access_token (" . $cache_filename . ") ...</p>" . PHP_EOL;
						   
				      $session_data = session_encode(); 
				      $fh = fopen ($cache_filename, 'w+'); 		
				      fwrite ($fh, $session_data); 
				      fclose ($fh);
			
} else {

					  // *** session has expired -- load our cached access_token from a local file 

					  echo "<p>[*] Loading access_token from cached file ...</p>" . PHP_EOL;
						   
			      	  $fh = fopen ($cache_filename, 'r');
				      $sessiondata = fread ($fh, 4096); 
				      fclose ($fh);
				      session_decode($sessiondata); 

        			  $accessToken = $_SESSION['access_token'];
        			  
		 			 // header('HTTP/1.1 302 Found');
					 // header('Location: '. $apiConfig['authorizationUrlBase']);
					 // exit;

					 if (empty($accessToken)) die("<p>Sorry, no access token found or our SESSION has expired.</p>" . PHP_EOL);       			  
}







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

	echo "<p><hr>[*] 'User Profile' Endpoint:</p>" . PHP_EOL;
		
?>


<h1>Hi, <?=$responseArray['user']['name'];?></h1>
<img src='<?=$responseArray['user']['avatar_url'];?>' width="75px" height="75px" />

<ul>
		<li>Email: <?=$responseArray['user']['email'];?></li>

		<li>BTCjam Score: <?=$responseArray['user']['btcjam_score'];?> (<?=$responseArray['user']['btcjam_score_numeric'];?>)</li>

		<li>Your Balance = <?=$responseArray['user']['balance'];?> BTC</li>
</ul>
---------------------------------------

<?

// -------------------------------------------------------------------------------------------


?>
