<?php include('includes/header.php') ?>
<form class='survey' action="/survey/2" method="POST">
  <?php Session::set('current_page', 'survey/2') ?>
  <div class="wrapper">
    <h2>Page Two</h2>
    <div class="buttons">
      <div class="inputs">
        <label for="howPurchased">How did you purchase our product(s)?</label>
        <input type="radio" name="howPurchased" value="Online" <?= $_POST['howPurchased'] == 'Online' || Session::get('answers')['howPurchased'] == 'Online' ? 'checked' : '' ?> >Online</option>
        <input type="radio" name="howPurchased" value="By Phone" <?= $_POST['howPurchased'] == 'By Phone' || Session::get('answers')['howPurchased'] == 'By Phone' ? 'checked' : '' ?>  >By Phone</option>
        <input type="radio" name="howPurchased" value="Mobile App" <?= $_POST['howPurchased'] == 'Mobile App' || Session::get('answers')['howPurchased'] == 'Mobile App' ? 'checked' : '' ?> >Mobile App</option>
        <input type="radio" name="howPurchased" value="In Store" <?= $_POST['howPurchased'] == 'In Store' || Session::get('answers')['howPurchased'] == 'In Store' ? 'checked' : '' ?>>In Store</option>
        <div class="error"><?= Session::get('errors')['second_page']['howPurchased'] ?></div>
      </div>
      <div class="inputs">
        <label for="purchased[]">What did you buy?</label>
        <input type="checkbox" name="purchased[]" value="Phone" <?= in_array('Phone', $_POST['purchased']) || in_array('Phone', Session::get('answers')['purchased']) ? 'checked' : '' ?>  >Phone</option>
        <input type="checkbox" name="purchased[]" value="Smart TV" <?= in_array('Smart TV', $_POST['purchased']) || in_array('Smart TV', Session::get('answers')['purchased']) ? 'checked' : '' ?> >Smart TV</option>
        <input type="checkbox" name="purchased[]" value="Laptop" <?= in_array('Laptop', $_POST['purchased']) || in_array('Laptop', Session::get('answers')['purchased']) ? 'checked' : '' ?>>Laptop</option>
        <div class="error"><?= Session::get('errors')['second_page']['purchased[]'] ?></div>
      </div>
      <div class="button-wrapper">
      <a href="/survey/1" class="button-link">Last Page</a>
      <button type='submit' class='button-button'>Next Page</button>
      </div>
    </div>
  </div>
</form>
<?php include('includes/footer.php') ?>
