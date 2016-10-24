<?php if(!Session::surveyAllowed()) {
  header('Location: /');
  exit();
} ?>
<?php include('includes/header.php') ?>
<form class='survey' action="/survey/1" method="POST">
  <?php Session::set('current_page', 'survey/1') ?>
  <div class="wrapper">
    <h2>Page One</h2>
    <div class="buttons">
      <div class="inputs">
        <label for="fullName">Enter your full name</label>
        <input type="text" name="fullName" value="<?= $_POST['fullName'] ? $_POST['fullName'] : Session::get('answers')['fullName'] ?>"></input>
        <div class="error"><?= Session::get('errors')['first_page']['fullName'] ?></div>
      </div>
      <div class="inputs">
        <label for="age">Enter your  age</label>
        <input type="number" name="age" value="<?= $_POST['age'] ? $_POST['age'] : Session::get('answers')['age'] ?>"></input>
        <div class="error"><?= Session::get('errors')['first_page']['age'] ?></div>
      </div>
      <div class="inputs">
        <label for="student">Are you a student?</label>
        <select name="student">
          <option value="Select One" <?= $_POST['student'] ? '' : 'selected' ?> disabled>Select One</option>
          <option value="Yes - Full Time" <?= ($_POST['student'] == 'Yes - Full Time' || Session::get('answers')['student'] == 'Yes - Full Time') ? 'selected' : '' ?>  >Yes - Full Time</option>
          <option value="Yes - Part Time" <?= ($_POST['student'] == 'Yes - Part Time' || Session::get('answers')['student'] == 'Yes - Part Time') ? 'selected' : '' ?> >Yes - Part Time</option>
          <option value="No" <?= ($_POST['student'] == 'No' || Session::get('answers')['student'] == 'No') ? 'selected' : '' ?>>No</option>
        </select>
        <div class="error"><?= Session::get('errors')['first_page']['student'] ?></div>
      </div>
      <div class="button-wrapper">
        <button type='submit' class='button-button'>Next Page</button>
      </div>
    </div>
  </div>
</form>
<?php include('includes/footer.php') ?>
