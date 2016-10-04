<?php
/*
  Like the Request class, this Session class exists as a wrapper around a superglobal so that our code looks cleaner and more readable
*/
  class Session {
    public static function start() {
      return session_start();
      //set some default fields if they do not exist (we need to know the furthest page they've gotten to, as well as...nothing?)
      if(!isset($_SESSION['furthestPageReached'])) {
        self::set('furthestPageReached', 0);
      }
    }

    public static function get($property) {
      return $_SESSION[$property];
    }

    public static function set($property, $value) {
      $_SESSION[$property] = $value;
      return isset($_SESSION[$property]);
    }

    public static function getSessionId() {
      return session_id(); //note that this is stored in the browser as a cookie! Yum
    }
  }
