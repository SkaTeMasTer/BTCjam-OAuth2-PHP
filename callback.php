<?PHP
// ------------------------------------------------------------------------------------
// | BTCjam-OAuth2-PHP
// ------------------------------------------------------------------------------------
// | + SOURCE CODE: https://github.com/SkaTeMasTer/BTCjam-OAuth2-PHP/
// | + Written by: Shawn Reimerdes (Leech Software)
// ------------------------------------------------------------------------------------


session_start();

require_once('config.php');
require_once('http_client.class.php');

$code = $_GET['code'];
$state = $_GET['state'];

// Verify the 'state' value is the same random value we created
if ((! is_numeric($state)) || ($state != $_SESSION['state'])) 
 					throw new Exception('ERROR: validating state. [cross-site request forgery (CSRF) is possible ?].');


			$accessTokenExchangeParams = array(
					 'client_id' => $apiConfig['oauth2_client_id'],
					 'client_secret' => $apiConfig['oauth2_client_secret'],
					 'grant_type' => 'authorization_code',
					 'code' => $code,
					 'redirect_uri' => $apiConfig['oauth2_redirectUriPath']
					);

 	// try {

			$httpClient = new HttpClient();

			$responseJson = $httpClient->postData($apiConfig['tokenUrlBase'], $accessTokenExchangeParams);
			
			$responseArray = json_decode($responseJson, TRUE);
	
	// catch () {}		



if(isset($responseArray['access_token'])) {
												// response contained an access_token element, request was successful.

			$accessToken = $responseArray['access_token'];
			$refreshToken = $responseArray['refresh_token'];


			$_SESSION['access_token'] = $accessToken;

			// We are just storing refresh token in the session state var, and using approval_prompt=force for simplicity. 
			// Typically and ideally the fresh token would be stored in a server-side database or server cache file.
			// This would eliminate the need for prompting the user for approval each time.
			$_SESSION['refresh_token'] = $refreshToken;


// we are authorized and have been granted all permissions, the OAuth2 dance is complete.
// redirect to new URL
header('Location: ./get_data.php');

} else {    
												// An error occurred and the description will be displayed  

		    $errorDesc = $responseArray['error_description'];
		    $errorName = $responseArray['error'];

		    printf("<p>Error: OAuth2 failed Failed: %s - %s</p>", $errorName, $errorDesc);

}

?>
