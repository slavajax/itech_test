<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str, $exit = false)
{
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
    if ($exit)
        exit;
}

function print_rr($arSourse, $exit = false)
{
    echo '<pre>';
    print_r($arSourse);
    echo '</pre>';
    if ($exit)
        die();
}