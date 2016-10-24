<?php
/*
This file handles URI requests. Why do we need a router for an app like this? Because we can!
Also, a question for you. For something like a final project for this course,
will you allow us to use frameworks such as Laravel?
Or should everything be done by hand?

REFACTORED:
No longer need to create an instance of a Router, every thing can be accessed statically now.
*/
class Router {

  protected static $routes = [
    'GET' => [],
    'POST' => []
  ];

  //executes the code in a provided file, and returns a router with routes read to route
  public static function load($file) {
    require $file; //executes the code in the file, which presumably is valid router methods. Note that $router is available to it.
  }
  //sets a route that can be accessed via GET requests
  public static function get($uri, $controller) {
    self::$routes['GET'][$uri] = $controller;
  }
  //sets a route that can be accessed via POST requests
  public static function post($uri, $controller) {
    self::$routes['POST'][$uri] = $controller;
  }

  public static function direct($uri, $requestType) {
    //checks to see if the particular URI exists as a key in the appropriate set (GET or POST)in our $routes variable and returns the path of the associate controller
    if(array_key_exists($uri, self::$routes[$requestType])) {
      return self::callAction(
        ...explode('@', self::$routes[$requestType][$uri])
      );
    }
    throw new Exception("<h1>404</h1> <h3>Not Found - Route {$uri} Does Not Exist</h3>");
  }

  protected static function callAction($controller, $action) {
    if(!method_exists($controller, $action)) {
      throw new Exception("<h1>Uh oh,</h1> <h3>The {$controller} does not support the {$action} action.");
    }

    return (new $controller)->$action();
    //all this crazy awesome stuff I'm doing I learned from a website called Laracasts.
    //I am redoing it here in this project because it helps me better understand frameworks such as Laravel.
  }

  public static function surveyRouteInfo() {
    //this only works since the survey for the project has exactly 3 pages
    //need to learn how to create wild card routes. i.e. router->get('survey/{pageNumber}', 'controller');
    // OR just use Laravel ;)
    switch(Request::uri()) {
      case 'survey':
        return Session::get('furthest_page_reached') > 3 ? 3 : Session::get('furthest_page_reached');
      case 'survey/1':
        return 1;
      case 'survey/2':
        return 2;
      case 'survey/3':
        return 3;
      default:
        return -1;
    }
  }
}
