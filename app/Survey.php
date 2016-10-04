<?php
/* This class represents the survey the user can complete. It handles saving answers to the session as well as validation.
   Perhaps in the future we can have it instantiate from a survey id in a database, so we can have as many surveys as we want instead
   of this less than ideal hardcoding of the values
*/
  class Survey {

    protected $questions = [];

    public static function create() {
      $survey = new self;
      $survey->loadQuestions();
      return $survey;
    }

    private function loadQuestions() {
      $pageOneQuestions = [
        new Question(1,"fullName", null, "Full Name", "text"),
        new Question(2, "age", null, "Your Age", "text"),
        new Question(3, "student", null, "Are you a student?", "dropdown", ['Yes, Full Time', 'Yes, Part Time', 'No'])
      ];
      $pageTwoQuestions = [
        new Question(4, "howPurchased", null, "How did you complete your purchase?", "radio", ['Online', 'By Phone', 'Mobile App', 'In Store']),
        new Question(5, "purchases[]", null, "Which of the following did you purchase?", "checkbox", ['Phone', 'Smart TV', 'Laptop'])
      ];
      $pageThreeQuestions = [
        new Question(6, "satisfaction", 5, "How happy are you on a scale from 1 (not satisfied) to 5 (very satisfied)", "radio", ['1', '2', '3', '4', '5']),
        new Question(7, "recommend", 5, "Would you recommend this device to a friend?", "dropdown", ['Yes', 'No'])
      ];
      $questions = [$pageOneQuestions, $pageTwoQuestions, $pageThreeQuestions];
      $this->questions = $questions;
    }

    public function displaySurveyPage($pageNumber) {
      if($pageNumber > count($this->questions) || $pageNumber <= 0) {
        throw new Exception("Invalid number of pages");
      }

      foreach($this->questions[$pageNumber - 1] as $question) {
        echo $question->render();
      }
    }
  }
