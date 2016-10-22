<?php
/*
  This class exists to store extra information about Question objects without muddying up our new Question constructor with 500 fields.
  For example, this class tells us whether or not a question is of type text, what options are associated with it,
  and what validation is required!
*/

class QuestionType {
  protected $questionType;
  protected $validationOptions = [];
  protected $questionOptions;

  public function __construct($questionType, $validationOptions, $questionOptions = null) {
    $this->questionType = $questionType;
    $this->validationOptions = $validationOptions;
    $this->questionOptions = $questionOptions;
  }

  public function getType() {
    return $this->questionType;
  }

  public function getValidationOptions() {
    return $this->validationOptions;
  }

  public function getQuestionOptions() {
    return $this->questionOptions;
  }
}
