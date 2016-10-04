<?php

class SurveyController {

  public function getSurvey() {
    $requestedPage = Router::surveyRouteInfo();
    $sessionPage = Session::get('furthestReached');
  }

  public static function postAnswers() {
    foreach($_POST as $question => $answer) {
      die("Key: {$question} => {$answer}");
      Session::set($question, $answer);
    }
  }
}
