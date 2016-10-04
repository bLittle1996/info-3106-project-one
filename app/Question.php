<?php

class Question {
  protected $id;
  protected $fieldName;
  protected $dependency;
  protected $questionText;
  protected $questionType;
  protected $questionOptions;

  public function __construct($id, $fieldName, $dependency, $questionText, $questionType, $questionOptions = null) {
    $this->id = $id;
    $this->fieldName = $fieldName;
    $this->dependency = $dependency;
    $this->questionText = $questionText;
    $this->questionType = $questionType;
    $this->questionOptions = $questionOptions;
  }

  public function render() {
    $labelMarkup = "<span class='question-label'>{$this->questionText}</span>";
    $inputField = "";
    if($this->questionType === 'radio' || $this->questionType === 'checkbox') {
      foreach($this->questionOptions as $questionOption) {
        $inputField = $inputField . "<input type='{$this->questionType}' name='{$this->fieldName}' value='{$questionOption}'>{$questionOption}</input>";
      }
    } else if($this->questionType === 'dropdown') {
      $inputField = "<select name='{$this->fieldName}'><option selected disabled value='none'>Select one</option>";
      foreach($this->questionOptions as $questionOption) {
        $inputField = $inputField . "<option value='{$questionOption}'>{$questionOption}</option>";
      }
      $inputField = $inputField . "</select>";

    } else {
      $inputField = "<input type='text' name='$this->fieldName' placeholder='enter answer'></input>";
    }

    return "<div class='question'>" . $labelMarkup . $inputField . "</div>";
  }
}
