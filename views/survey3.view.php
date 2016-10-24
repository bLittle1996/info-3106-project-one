<?php include('includes/header.php') ?>
<form class='survey' action="/survey/3" method="POST">
  <?php Session::set('current_page', 'survey/3') ?>
  <div class="wrapper">
  <h2>Page Three</h2>
  <div class="buttons">
    <?php
      foreach(Session::get('answers')['purchased'] as $item) {
        echo "<h3>Please answer the following questions about your purchased {$item}</h3>";
        $item = str_replace(' ', '_', $item);
        echo "<div class='inputs'>";
          echo "<label for'satisfaction{$item}'>How satisfied are you with the product?</label>";
          echo "<input type='radio' value='1' name='satisfaction{$item}' " . ($_POST["satisfaction{$item}"] == '1' ? 'checked' : '') . ">1</input>";
          echo "<input type='radio' value='2' name='satisfaction{$item}' " . ($_POST["satisfaction{$item}"] == '2' ? 'checked' : '') . ">2</input>";
          echo "<input type='radio' value='3' name='satisfaction{$item}' " . ($_POST["satisfaction{$item}"] == '3' ? 'checked' : '') . ">3</input>";
          echo "<input type='radio' value='4' name='satisfaction{$item}' " . ($_POST["satisfaction{$item}"] == '4' ? 'checked' : '') . ">4</input>";
          echo "<input type='radio' value='5' name='satisfaction{$item}' " . ($_POST["satisfaction{$item}"] == '5' ? 'checked' : '') . ">5</input>";
          echo "<div class='error' >" . Session::get('errors')['third_page']["satisfaction{$item}"] . "</div>";
        echo "</div>";

        echo "<div class='inputs'>";
        echo "<label for'recommend{$item}'>Would you recommend this product to someone else?</label>";
          echo "<select name='recommend{$item}'>";
            echo "<option value='Select One' disabled " . ($_POST["recommend{$item}"] ? '' : 'selected') . ">Select One</option>";
            echo "<option value='Yes' " . ($_POST["recommend{$item}"] == 'Yes' ? 'selected' : '') . ">Yes</option>";
            echo "<option value='No' " . ($_POST["recommend{$item}"] == 'No' ? 'selected' : '') . ">No</option>";
          echo "</select>";
          echo "<div class='error' >" . Session::get('errors')['third_page']["recommend{$item}"] . "</div>";
        echo "</div>";
      }
     ?>
     <div class="button-wrapper">
    <a href="/survey/2" class="button-link">Last Page</a>
    <button type='submit' class='button-button'>Complete</button>
    </div>
  </div>
  </div>
</form>
<?php include('includes/footer.php') ?>
