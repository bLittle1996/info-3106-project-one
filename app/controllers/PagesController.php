<?php
/* Handles routing requests to simple navigable pages, such as our beautiful landing page */
class PagesController {

  public function home() {
    require 'views/home.view.php';
  }
}
