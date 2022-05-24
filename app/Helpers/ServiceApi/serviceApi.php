<?php
function serviceApi($endpoint) {
    $url="https://api.covid19api.com/$endpoint";
    $crl = curl_init();

    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($crl);

    if(!$response){
        die('Error: "' . curl_error($crl) . '" - Code: ' . curl_errno($crl));
    }
    return $response;
    curl_close($crl);
}