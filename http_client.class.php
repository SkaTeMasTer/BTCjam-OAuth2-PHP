<?php
// ------------------------------------------------------------------------------------
// | BTCjam-OAuth2-PHP
// ------------------------------------------------------------------------------------
// | + SOURCE CODE: https://github.com/SkaTeMasTer/BTCjam-OAuth2-PHP/
// | + Written by: Shawn Reimerdes (Leech Software)
// | + Donate BTC to me: 1SHaWNgQaMKdwPMyZZWgLmD4HN1FUM4hg
// ------------------------------------------------------------------------------------

define('DEBUG_MODE', 1);

define('TIMEOUT_MINUTES', 8);
define('HTTP_USER_AGENT', "BTCjam-OAuth2-PHP/v1.00");
define('HTTP_COOKIE_FILENAME', "/tmp/phpsession_btcjam.txt");

class HttpClient {

     public $ch;
     public $url;

     public $headers;
     public $query;



// -----------------------------------------------
public function __construct() {
      
         $this->ch = curl_init();

         $headers["User-Agent"] = HTTP_USER_AGENT;

         $connect_timeout_secs = (60 * TIMEOUT_MINUTES);

         curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);

         curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, $connect_timeout_secs );    // connect timeout (secs)     
         curl_setopt($this->ch, CURLOPT_TIMEOUT, $connect_timeout_secs );           // script run timeout (secs)

         curl_setopt($this->ch, CURLOPT_FAILONERROR, 1);                            // request failure on HTTP response >= 400
         curl_setopt($this->ch, CURLOPT_VERBOSE, 1);                                // verbose output

                                                                                       // extra SSL connection checking (enable on production server)
         // curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 2);                         // checking the server's certificate's claimed identity (via domain)
         // curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 1);                         // verify the peer's SSL certificate
}
// -----------------------------------------------
public function __destruct() {

        curl_close($this->ch);
}
// -----------------------------------------------
public function postData($url, $postData) {             // *** POST data via the QUERY STRING (for basic)

        $query = $this->buildHttpQueryString($postData);
      
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_POST => TRUE,
            CURLOPT_POSTFIELDS => $query);

        curl_setopt_array($this->ch, $options);

        $response = curl_exec($this->ch);

        $this->checkThrowErrorException($response);

    return $response;
}
// -----------------------------------------------
public function getData($url, $headers) {               // *** POST data via underlining HTTP HEADER structure (does not expose keys to logs or browser)

        curl_setopt( $this->ch, CURLOPT_URL, $url );
        curl_setopt( $this->ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $this->ch, CURLOPT_RETURNTRANSFER, TRUE );
        curl_setopt( $this->ch, CURLOPT_FOLLOWLOCATION, 1 );

        $response = curl_exec( $this->ch );

        $this->checkThrowErrorException($response);

    
    return $response;
}
// -----------------------------------------------   
public function buildHttpQueryString($postData) {

        $query = "";

        while(list($key, $val) = each($postData)) {

                if(strlen($query) > 0) $query = $query . '&';
                
                $query = $query . $key . '=' . $val;
        }

    return $query;
}
// ----------------------------------------------- 
public function checkThrowErrorException($response) {

        if(FALSE === $response) {

            $curlErr = curl_error($this->ch);
            $curlErrNum = curl_errno($this->ch);

            curl_close($this->ch);
            throw new Exception($curlErr, $curlErrNum);
        }

}
// -----------------------------------------------
public function createCookie($access_token) {

         if (DEBUG_MODE) echo "<p>[*] Saving cookie -- creating file to cache access_token (" . HTTP_COOKIE_FILENAME . ") ...</p>" . PHP_EOL;
                           
         $session_data = session_encode(); 
         $fh = fopen (HTTP_COOKIE_FILENAME, 'w+');       
         fwrite ($fh, $session_data); 
         fclose ($fh);

}
// -----------------------------------------------
public function readCookie() {


        if (DEBUG_MODE) echo "<p>[*] Loading access_token from cached file ...</p>" . PHP_EOL;
                           
        $fh = fopen (HTTP_COOKIE_FILENAME, 'r');
        $sessiondata = fread ($fh, 4096); 
        fclose ($fh);
        $access_token = session_decode($sessiondata); 

        if (DEBUG_MODE) 
            if (!empty($sessiondata)) echo "<p>[*] Found an access_token = " . $sessiondata . "</p>" . PHP_EOL;
            else echo "<p>Sorry, no access token found -- your SESSION has expired.</p>" . PHP_EOL;             

    return $access_token;
}
// -----------------------------------------------
public function redirectToLoginPage() {

        header('HTTP/1.1 302 Found');
        header('Location: '. $apiConfig['authorizationUrlBase']);
                    
}

// ---
}
?>
