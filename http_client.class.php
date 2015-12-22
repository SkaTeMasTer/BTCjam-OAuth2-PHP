<?php
// ------------------------------------------------------------------------------------
// | BTCjam-OAuth2-PHP
// ------------------------------------------------------------------------------------
// | + SOURCE CODE: https://github.com/SkaTeMasTer/BTCjam-OAuth2-PHP/
// | + Written by: Shawn Reimerdes (Leech Software)
// | + Donate BTC to me: 1SHaWNgQaMKdwPMyZZWgLmD4HN1FUM4hg
// ------------------------------------------------------------------------------------
define('TIMEOUT_MINUTES', 8);

class HttpClient {

     public $ch;
     public $url;

     public $headers;
     public $query;

// -----------------------------------------------
public function __construct() {
      
         $this->ch = curl_init();

         $headers["User-Agent"] = "BTCjam-OAuth2-PHP/v1.00";

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


}

?>
