<?php
/* This file initializes our whole program and directs our router to go to the appropriate page.
Every single page request passed through here to be routed.

Tested by running php -S localhost:8000, some apache server configuration may be required

I think, just an inkling though, that I may have, just may have, over engineered this project...
But hey I learned lots of cool stuff!

Most content learned from Laracast's PHP Practitioner and personal experience using Laravel 5
*/
require 'vendor/autoload.php';
require 'app/bootstrap.php';
Router::load('routes.php');
Session::start();


try {
  Router::direct(Request::uri(), Request::method());
} catch (Exception $ex) {
  die($ex->getMessage());
}
