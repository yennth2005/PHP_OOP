<?php

use eftec\bladeone\BladeOne;

if (!function_exists('view')) {
    function view($view, $data = [])
    {
        $views = __DIR__ . '/views';
        $cache = __DIR__ . '/storage/compiles';
        $blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
        echo $blade->run($view, $data);
    }
}

if (!function_exists('is_upload_file')) {
    function is_upload_file($key)
    {
        return isset($_FILES[$key]) && $_FILES[$key]['size'] > 0;
    }
}

if (!function_exists('file_url')) {
    function file_url($url)
    {
        if (!file_exists($url)) {
            return null;
        }
        return $_ENV['APP_URL'] . $url;
    }
}

if (!function_exists('debug')) {
    function debug(...$data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if (!function_exists('redirect')) {
    function redirect($path)
    {
        header("Location: " . $path);
        exit;
    }
}

if (!function_exists('redirect404')) {
    function redirect404()
    {
        header("HTTP/101 404 Not Found");
        exit;
    }
}

if (!function_exists('middleware_auth')) {
    function middleware_auth()
    {
        $currentUrl = $_SERVER['REQUEST_URI'];
        $regExp = '/^\/(auth|login|register)$/';
        $urlRegEx = '/^\/admin/';

        if (empty($_SESSION['user'])) {
            if (!preg_match($regExp, $currentUrl) && preg_match($urlRegEx, $currentUrl)) {
                $redirectTo = ($_SESSION['user']['type'] == 'admin') ? '/admin' : '/';
                redirect('/auth');
            } 
        }else {
                if (preg_match($regExp, $currentUrl)) {
                    $redirectTo = ($_SESSION['user']['type'] == 'admin') ? '/admin' : '/';
                    redirect($redirectTo);
                }
                if (
                    preg_match($urlRegEx, $currentUrl)
                    && $_SESSION['user']['type'] != 'admin'
                ) {
                    redirect('/');
                }
            }
    }
}

if(!function_exists('slug')){
    function slug($str, $separator = '-'){
        $str = mb_strtolower($str,'UTF-8');
        $str = preg_replace('/[^\p{L}\p{N}\s]/u', '',$str);
        $str = preg_replace('/[\s]+/',$separator,$str);
        $str = trim($str,$separator). '-'.random_string(6);

        return $str;
    }
}

if(!function_exists('random_string')){
    function random_string($length=10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for($i = 0;$i<$length;$i++){
            $randomString .=$characters[rand(0,$charactersLength-1)];
        }
        return $randomString;
    }
}