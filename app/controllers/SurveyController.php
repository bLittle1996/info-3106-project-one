<?php
/* This controller handles user interaction with our Survey object */
class SurveyController {

  public function getSurvey() {
    $requestedPage = Router::surveyRouteInfo();           //page they are trying to reach
    $sessionPage = Session::get('furthest_page_reached'); //furthest allowed page
    $pageNumber = ($requestedPage <= $sessionPage) ? $requestedPage : $sessionPage;
    $survey = Survey::create();
    require 'views/survey.view.php';
  }

  public static function postAnswers() {
    if(self::validate($_POST)) {
      foreach($_POST as $question => $answer) {
        Session::setAnswer($question, $answer);
      }
      Session::set('furthest_page_reached', Session::get('furthest_page_reached') + 1);
      Router::direct('/survey/' . Session::get('furthest_page_reached'), 'GET');
    }


  }

  private static function validate($answers) {
    //we know all fields are required
    try {
      $questions = Survey::getQuestionsForPage(Session::getCurrentPage());

      foreach($questions as $question) {
        foreach($answers as $key => $value) { //O(n^2) is best :(
          if(strpos($key, $question->fieldName) && in_array('numeric' ,$this->questionType->validationOptions)) {
            return (intval($value) != 0) ? true : false;
          }
          if(empty(str_replace(' ', '', $key))) {
            return false;
          }
        }
      }

    } catch(Exception $ex) {
      echo $ex->getMessage();
    }
  }
}
