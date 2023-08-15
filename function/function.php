<?php

//
function postInit($postData){
    if(isset($postData)){
        return $postData;
    } else {
        return '';
    }
}

function getFullUrl($fileName=''){
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);
    $fullURL = $protocol . '://' . $host . $path . '/' .$fileName;
    return $fullURL;
}

function errorMessageSet($error_message){
    return '?error=' . $error_message;
}