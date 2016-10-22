<?php include('includes/header.php') ?>
<form class='survey' action="survey" method="POST">
  <?php $survey->displaySurveyPage($pageNumber) ?>
  <div class="buttons">
    <a href="#" class="link-button">Last Page</a>
    <button type='submit' class='button-button'>Next Page</button>
  </div>
</form>
<?php include('includes/footer.php') ?>
