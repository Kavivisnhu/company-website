<?php
error_reporting(E_ALL);
$request = $_SERVER['REQUEST_URI'];
$base_url='';
switch ($request)  {
    case $base_url:
    case $base_url.'home':
       include 'pages/home.php';
       break;

    case $base_url.'about':
        include 'pages/about.php';
        break;

    case $base_url.'services':
        include 'pages/services.php';
        break; 

    case $base_url.'contact':
        include 'pages/contact.php';
        break; 
        
    default:
    //  include'pages/404.php';
     break;
    }
    ?>
    
