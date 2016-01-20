<?php
// ------------------------------------------------------------------------------------
// | BTCjam-OAuth2-PHP
// ------------------------------------------------------------------------------------
// | + SOURCE CODE: https://github.com/SkaTeMasTer/BTCjam-OAuth2-PHP/
// | + Written by: Shawn Reimerdes (Leech Software)
// ------------------------------------------------------------------------------------

ini_set('display_errors', 1); error_reporting(E_ALL);  // debug

// TODO: obviously this is just a demo -- needs to be seperated into a new class, etc...


session_start();

require_once('config.php');
require_once('http_client.class.php');




	try {

				$httpClient = new HttpClient();

				// --------------{{ CHECK FOR TOKEN
				if (isset($_SESSION) && !empty($_SESSION['access_token'])) {
				       	
				        	 		  // *** new session started -- cache session to local file (prevents needing to reauthorize your app)

									  $accessToken = $_SESSION['access_token'];

				        			  $httpClient->createCookie($_SESSION['access_token']);
							
				} else {
									  // *** session has expired -- load our cached access_token from a local file 				  
				        			  
				        			  $accessToken = $httpClient->readCookie();

									  if (empty($accessToken)) {     // no access token found!
									  			
									  			$httpClient->redirectToLoginPage();
									  }      			  
				}
				// ----------------}}


				$headers = array('Authorization: Bearer ' . $accessToken);       // required auth2 header

				$response = $httpClient->getData($apiConfig['userprofileUrlBase'], $headers);
				
				$responseArray = json_decode($response, TRUE);
		

	} catch(Exception $e) {
	  			echo '*** Error: exception ' .$e->getMessage();
				//$httpClient->redirectToLoginPage();
				exit;
	}
	



// -------------------------------------------------------------------------------------------		
?>
			<h1>Hi, <?=$responseArray['user']['name'];?></h1>
			<img src='<?=$responseArray['user']['avatar_url'];?>' width="75px" height="75px" />

			<ul>
					<li>Email: <?=$responseArray['user']['email'];?></li>

					<li>BTCjam Score: <?=$responseArray['user']['btcjam_score'];?> (<?=$responseArray['user']['btcjam_score_numeric'];?>)</li>

					<li>Your Balance = <?=$responseArray['user']['balance'];?> BTC</li>
			</ul>
			-------------------
<?
// -------------------------------------------------------------------------------------------




?>
