<?php
/* this class represents a question that the user can answer */
class Question {
  protected $id;
  protected $fieldName;
  protected $dependency;
  protected $questionType;

  public function __construct($id, $fieldName, $dependency, $questionText, $questionType) {
    $this->id = $id;
    $this->fieldName = $fieldName;
    $this->dependency = $dependency;
    $this->questionText = $questionText;
    $this->questionType = $questionType;
  }

  public function render() {
    $labelMarkup = "<span class='question-label'>{$this->questionText}</span>";
    $inputField = "";
    if($this->questionType->getType() === 'radio' || $this->questionType->getType() === 'checkbox') {
      foreach($this->questionType->getQuestionOptions() as $questionOption) {
        $inputField = $inputField . "<input type='{$this->questionType->getType()}' name='{$this->fieldName}' value='{$questionOption}'>{$questionOption}</input>";
      }
    } else if($this->questionType->getType() === 'dropdown') {

      $inputField = "<select name='{$this->fieldName}'><option selected disabled value='none'>Select one</option>";
      foreach($this->questionType->getQuestionOptions() as $questionOption) {
        $inputField = $inputField . "<option value='{$questionOption}'>{$questionOption}</option>";
      }
      $inputField = $inputField . "</select>";

    } else {
      $inputField = "<input type='text' name='$this->fieldName' placeholder='enter answer'></input>";
    }

    return "<div class='question'>" . $labelMarkup . $inputField . "</div>";
  }
}
