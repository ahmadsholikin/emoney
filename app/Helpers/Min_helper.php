<?php

function testing($obj) {
    echo "<pre>";
    print_r($obj);
    echo "</pre>";
}

function selected($a, $b)
{
    if ($a == $b) {
        return "selected";
    }
}

function enc($str, $kunci)
{
    $hasil = '';
    for ($i = 0; $i < strlen($str); $i++) {
        $karakter = substr($str, $i, 1);
        $kuncikarakter = substr($kunci, ($i % strlen($kunci)) - 1, 1);
        $karakter = chr(ord($karakter) + ord($kuncikarakter));
        $hasil .= $karakter;
    }
    return str_replace("%", "SiCAKAP.MAGELANGKOTA.GO.ID", urlencode(base64_encode($hasil)));
}

function dec($str, $kunci)
{
    $str = str_replace("SiCAKAP.MAGELANGKOTA.GO.ID", "%", $str);
    $str = base64_decode(urldecode($str));
    $hasil = '';
    for ($i = 0; $i < strlen($str); $i++) {
        $karakter = substr($str, $i, 1);
        $kuncikarakter = substr($kunci, ($i % strlen($kunci)) - 1, 1);
        $karakter = chr(ord($karakter) - ord($kuncikarakter));
        $hasil .= $karakter;
    }
    return $hasil;
}

if (!function_exists('base64url_encode'))
{
    function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}

if (!function_exists('base64url_decode'))
{
    function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}

function entitiestag($variable)
{
    $variable = htmlentities($variable, ENT_QUOTES, 'UTF-8');
    if(strpos($variable, "&lt")>=1)
    {
        return substr($variable, 0, strpos($variable, "&lt"));
    }
    else{
        return $variable;
    }
}


if (!function_exists('base_file')) 
{
    function base_file($location,$default='filenotfound.png') 
    {
        $string_file = $location;
        $status = true;
        if(!file_exists('writable/uploads/'.$location) || empty($location)){
            $string_file = $default;
            $status = false;
        }
        return (object)array('url'=>site_url(). 'writable/uploads/'.$string_file,'status'=>$status);
    }
}

if (!function_exists('backend_url'))
{
    function backend_url($url='')
    {
        return base_url('backend/'.$url);
    }
}
