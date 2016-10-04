<?php
/* This file initializes our whole program and directs our router to go to the appropriate page.
   Every single page request passed through here to be routed.
*/
require 'vendor/autoload.php';
require 'app/bootstrap.php';
Router::load('routes.php');
$survey = Survey::create();
Session::start();
try {
  Router::direct(Request::uri(), Request::method());
} catch (Exception $ex) {
  die($ex->getMessage());
}
