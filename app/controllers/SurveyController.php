<?php
/* This controller handles user interaction with our survey */
class SurveyController {


  public function getSurvey() {
    $requestedPage = Router::surveyRouteInfo();
    $furthestPage = Session::get('furthest_page_reached');
    if($furthestPage == 4) {
      header('Location: /survey/results');
    } else if($requestedPage <= $furthestPage) {
      require "views/survey{$requestedPage}.view.php";
    } else {
      require "views/survey{$furthestPage}.view.php";
    }
  }

  public function getResults() {
    if(Session::get('furthest_page_reached') == 4) {
      require 'views/results.view.php';
    } else {
      header("Location: /");
    }
  }

  public function allowSurvey() {
    $sessId = $_POST['_session'];
    if($sessId == Session::getSessionId()) {
      Session::set('allowed', true);
      header("Location: /survey/1");
    } else {
      header("Location: /");
    }
  }

  public function clearSession() {
    $sessId = $_POST['_session'];
    echo "{$sessId}, " . Session::getSessionId();
    if($sessId == Session::getSessionId()) {
      Session::clearSession();
    }
    header("Location: /");
  }

  public function postPageOne() {
    $_SESSION['errors']['first_page'] = [];
    if(self::validatePageOne($_POST)) {
      echo "valid";
      foreach($_POST as $question => $answer) {
        Session::setAnswer($question, $answer);
      }
      if(Session::get('furthest_page_reached') < 2) {
        Session::set('furthest_page_reached', 2);
      }
      header('Location: /survey/2');
    } else {
      require 'views/survey1.view.php';
    }
  }

  public function postPageTwo() {
    if(self::validatePageTwo($_POST)) {
      foreach($_POST as $question => $answer) {
        Session::setAnswer($question, $answer);
      }
      if(Session::get('furthest_page_reached') < 3) {
        Session::set('furthest_page_reached', 3);
      }
      header('Location: /survey/3');
    } else {
      require 'views/survey2.view.php';
    }
  }

  public function postPageThree() {
    if(self::validatePageThree($_POST)) {
      foreach($_POST as $question => $answer) {
        Session::setAnswer($question, $answer);
      }
      if(Session::get('furthest_page_reached') < 4) {
        Session::set('furthest_page_reached', 4);
      }
      header('Location: /survey/results');
    } else {
      require 'views/survey3.view.php';
    }
  }
  //the following is not an example of seperation of concerns
  public static function validatePageOne($answers) {
    $valid = true;
    if(!str_replace(' ',  '', $answers['fullName'])) {
      Session::addError('first_page', 'fullName', 'This field is required!');
      $valid = false;
    }

    if(intval($answers['age']) == 0) {
      Session::addError('first_page', 'age', 'This field must be a number');
      $valid = false;
    }

    if(!$answers['student']) {
      Session::addError('first_page', 'student', 'This field is required!');
      $valid = false;
    }
    return $valid;
  }

  public static function validatePageTwo($answers) {
    $valid = true;
    $_SESSION['errors']['second_page'] = [];
    if(!$answers['howPurchased']) {
      Session::addError('second_page', 'howPurchased', 'This field is required!');
      $valid = false;
    }

    if(!$answers['purchased']) {
      Session::addError('second_page', 'purchased[]', 'This field is required!');
      $valid = false;
    }
    return $valid;
  }

  public static function validatePageThree($answers) {
    $recommendations = array_map(function ($item) { return "recommend{$item}"; },Session::get('answers')['purchased']);
    $satisfaction = array_map(function ($item) { return "satisfaction{$item}"; },Session::get('answers')['purchased']);
    $valid = true;
    $_SESSION['errors']['third_page'] = [];

    foreach($recommendations as $recommendation) {
      if(!$answers[str_replace(' ', '_', $recommendation)]) {
        Session::addError('third_page', str_replace(' ', '_', $recommendation), 'This field is required!');
        $valid = false;
      }
    }

    foreach($satisfaction as $satisfiable) {
      if(!$answers[str_replace(' ', '_', $satisfiable)]) {
        Session::addError('third_page', str_replace(' ', '_', $satisfiable), 'This field is required!');
        $valid = false;
      }
    }

    return $valid;
  }
}
