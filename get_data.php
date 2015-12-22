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

$accessToken = $_SESSION['access_token'];

// *** The OAuth2 dance is complete.  We can now make calls to the API.


// OAuth2 authorized requests must send the 'access_token' via a 
// modified HTTP header w/ Authorization Bearer Token. The protocol
// outlines this security method instead of a QUERY POST, 
// in order to protect our tokens from plain-text and browsers 

// -------------------------------------------------------------------------------------------

	// * Endpoint: [GET] /api/v1/me

 	// try {

			$httpClient = new HttpClient();

			$headers = array('Authorization: Bearer ' . $accessToken);

			$response = $httpClient->getData($apiConfig['userprofileUrlBase'], $headers);
			
			$responseArray = json_decode($response, TRUE);
	
	// catch () {}	

 	

// todo: obviously this is just a demo, bad coding here... needs to be seperated into a new class, etc...


// there is a single method in the API implemented here...


	// *** 'User Profile' Endpoint 



	echo "<p>[*] 'User Profile' Endpoint / using Scope(s): basic_profile, extended_profile ...</p>\n";
	print_r($responseArray);





?>
