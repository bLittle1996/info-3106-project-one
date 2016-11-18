<?php
/*
  This class exists to beautify and make our code more readable, so we don't have super globals wrapped in functions thoughout our code.
*/
  class Request {
    public static function uri() {
      //make sure to trim leading and endings /, and ignore ?blarg=FEWAFEWAFAEW&this=sortofthing
      return parse_url(strtolower(trim($_SERVER['REQUEST_URI'], '/')), PHP_URL_PATH);
    }

    public static function method() {
      return $_SERVER['REQUEST_METHOD'];
    }

    public static function root() {
      return trim(explode('index.php', strtolower($_SERVER['PHP_SELF']))[0], '/');
    }
  }
