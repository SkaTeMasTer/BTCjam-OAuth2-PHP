<?php
// ------------------------------------------------------------------------------------
// | BTCjam-OAuth2-PHP
// ------------------------------------------------------------------------------------
// | + SOURCE CODE: https://github.com/SkaTeMasTer/BTCjam-OAuth2-PHP/
// | + Written by: Shawn Reimerdes (Leech Software)
// | + Donate BTC to me: 1SHaWNgQaMKdwPMyZZWgLmD4HN1FUM4hg
// ------------------------------------------------------------------------------------

class HttpClient {

     public $ch;
     public $url;

     public $headers;
     public $query;

// -----------------------------------------------
public function __construct() {
      
         $this->ch = curl_init();

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
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
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
