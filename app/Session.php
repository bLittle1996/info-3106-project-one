<?php
/*
  Like the Request class, this Session class exists as a wrapper around a superglobal so that our code looks cleaner and more readable
*/
  class Session {
    public static function start() {
      session_start();
      //set some default fields if they do not exist (we need to know the furthest page they've gotten to)
      if(!isset($_SESSION['furthest_page_reached'])) {
        self::set('furthest_page_reached', 1);
        //when an set of questions is successfully posted/validated we should increment this to the neext page
      }

      if(!isset($_SESSION['answers'])) {
        self::set('answers', []); //instantiate to empty array for storage
      }
    }

    public static function clear() {
      $_SESSION = [];
    }

    public static function get($property) {
      return $_SESSION[$property];
    }

    public static function set($property, $value) {
      $_SESSION[$property] = $value;
      return isset($_SESSION[$property]);
    }

    public static function setAnswer($property, $value) {
      $_SESSION['answers'][$property] = $value;
      return isset($_SESSION['answers'][$property]);
    }

    //ideally called for each page we go to
    public static function setCurrentPage($value) {
      return self::set('current_page', $value);
    }

    public static function getCurrentPage() {
      return self::get('current_page');
    }

    public static function getSessionId() {
      return session_id(); //note that this is stored in the browser as a cookie! Yum
    }

    public static function clearSession() {
      $_SESSION = [];
      return empty($_SESSION);
    }

    //for debugging purposes, please do not use in production
    public static function dd() {
      die(var_dump($_SESSION));
    }
  }
