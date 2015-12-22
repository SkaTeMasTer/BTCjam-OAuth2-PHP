<?php
// ------------------------------------------------------------------------------------
// | BTCjam-OAuth2-PHP
// ------------------------------------------------------------------------------------
// | + SOURCE CODE: https://github.com/SkaTeMasTer/BTCjam-OAuth2-PHP/
// | + Written by: Shawn Reimerdes (Leech Software)
// ------------------------------------------------------------------------------------

global $apiConfig;

$apiConfig = array(

    // You _must_ enter the API access details you create here: (https://btcjam.com/oauth/applications)
    'oauth2_client_id'       => '<ENTER_YOUR_TOKEN_HERE>',
    'oauth2_client_secret'   => '<ENTER_YOUR_SECRET_HERE>',
    'oauth2_redirectUriPath' => '<ENTER_YOUR_CALLBACK_HERE>',

    // URL for the OAuth authorization endpoint (from the API provider’s documentation)
    'authorizationUrlBase' => 'https://btcjam.com/oauth/authorize',
    'tokenUrlBase'         => 'https://btcjam.com/oauth/token',
    'applicationUrlBase'   => 'https://btcjam.com/oauth/applications',

    'userprofileUrlBase'   => 'https://btcjam.com/api/v1/me',

    // API defined list of permissions you are requesting authorization for:  (https://btcjam.com/faq/api)
    // * basic_profile
    // * extended_profile
    // * make_loan
    // * identity_information
    // * address_information
    // * income_information
    // * invest
    // * trade
    // * withdraw
    // * submit_documents
    // * manage_references    
    'scope' => 'basic_profile make_loan extended_profile identity_information address_information income_information invest trade withdraw submit_documents manage_references',

    // todo: enable disk cache
    // file cache for access token storage
    'cacheDirectory'  => (function_exists('sys_get_temp_dir') ? sys_get_temp_dir() . '/oauthapiClient' : '/tmp/oauthapiClient'),

    // class detailss
    'app_name' => 'BTCjam-OAuth2-PHP',
    'app_version' => '1.00'     
);

?>
