<?php
// ------------------------------------------------------------------------------------
// | BTCjam-OAuth2-PHP
// ------------------------------------------------------------------------------------
// | + SOURCE CODE: https://github.com/SkaTeMasTer/BTCjam-OAuth2-PHP/
// | + Written by: Shawn Reimerdes (Leech Software)
// ------------------------------------------------------------------------------------


require_once('config.php');
require_once('http_client.class.php');

// -------------------------------------------------------------------------------------------
function getNewAccessToken($refreshToken) {

// Refreshing the access token is accomplished by making a HTTP POST to the token endpoint, 
// specifying the grant_type as refresh_token and including the refresh_token.



			 $refreshTokenParams = array(
										 'client_id' => $apiConfig['oauth2_client_id'],
										 'client_secret' => $apiConfig['oauth2_client_secret'],
										 'grant_type' => 'refresh_token',
										 'refresh_token' => $refreshToken
			 							);
 	// try {
			 $httpClient = new HttpClient();
			 
			 $responseJson = $httpClient->postData($apiConfig['tokenUrlBase'], $refreshTokenParams);

			 $responseArray = json_decode($responseJson, TRUE);

	// catch () {}	

 return $responseArray;
}
// -------------------------------------------------------------------------------------------


	$responseArray = getNewAccessToken($_SESSION['access_token']);



	$accessToken = $responseArray['access_token'];
	$refreshToken = $responseArray['refresh_token'];
	//$expiresIn = $responseArray['expires_in'];


?>
