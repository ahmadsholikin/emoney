<?php

if (!function_exists('post_api_webservice'))
{
    function post_api_webservice($url, $array)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 9000,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $array
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}

if (!function_exists('jsonResponse'))
{
    function jsonResponse($output, $ajax = NULL)
    {
        $ajax_request = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ? TRUE : FALSE;
        
        if ($ajax != NULL) 
        {
            (!$ajax_request) ? exit('No direct script access allowed') : '';
        }

        if (defined('JSON_PRETTY_PRINT')) 
        {
            $output = json_encode($output);
        } 
        else 
        {
            $output = json_encode($output);
        }

        header('content-type: application/json; charset: UTF-8');
        header('cache-control: must-revalidate');
        header('expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');

        echo $output;
        exit();
    }
}

if (!function_exists('get_data'))
{
    function get_data($url, $param = "")
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err)
        {
            echo "cURL Error #:" . $err;
            $hasil = FALSE;
        } 
        else
        {
            /* echo $response; */
            $hasil = json_decode($response, true);
        }

        return $hasil;
    }
}

if (!function_exists('get_api'))
{
    function get_api($url, $param = "") {
        $ch = curl_init();
        curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                ),
          ));
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result);
        return $response;
    }
}


if (!function_exists('api_post'))
{
    function api_post($url, $post)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => $url,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 9000,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => $post,
            CURLOPT_HTTPHEADER     => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}
?>