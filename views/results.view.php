<?php include('includes/header.php') ?>
<?php Session::set('current_page', 'survey/results') ?>
  <div class='wrapper'>
    <h2>Thank you for filling out our survey, below you can see your responses to relive the experience!</h2>
    <div class='responses'>
      <table>
        <tr>
          <td>Page One</td>
          <tr><td><br></td></tr>
        </tr>
        <tr>
          <td>Your Name:</td><td><?= Session::get('answers')['fullName'] ?></td>
        </tr>
        <tr>
          <td>Your Age:</td><td><?= Session::get('answers')['age'] ?></td>
        </tr>
        <tr>
          <td>Are you a student?</td><td><?= Session::get('answers')['student'] ?></td>
        </tr>
        <tr>
          <tr><td><br></td></tr>
          <td>Page Two</td>
          <tr><td><br></td></tr>
        </tr>
        <tr>
          <td>How you purchased our products: </td><td><?= Session::get('answers')['howPurchased'] ?></td>
        </tr>
        <tr>
          <td>What products you purchased:</td><td><?php foreach(Session::get('answers')['purchased'] as $item) { echo "{$item} "; } ?></td>
        </tr>
        <tr>
          <tr><td><br></td></tr>
          <td>Page Three</td>
          <tr><td><br></td></tr>
        </tr>
        <?php
          if(Session::get('answers')['satisfactionSmart_TV']) {
            echo "<tr>";
            echo "<td>Purchased Smart TV</td><td>Satisfaction: " . Session::get('answers')["satisfactionSmart_TV"] . " Would recommend? " . Session::get('answers')['recommendSmart_TV'] . "</td>";
            echo "</tr>";
          }
          if(Session::get('answers')['satisfactionLaptop']) {
            echo "<tr>";
            echo "<td>Purchased Laptop</td><td>Satisfaction: " . Session::get('answers')["satisfactionLaptop"] . " Would recommend? " . Session::get('answers')['recommendLaptop'] . "</td>";
            echo "</tr>";
          }
          if(Session::get('answers')['satisfactionPhone']) {
            echo "<tr>";
            echo "<td>Purchased Phone</td><td>Satisfaction: " . Session::get('answers')["satisfactionPhone"] . " Would recommend? " . Session::get('answers')['recommendPhone'] . "</td>";
            echo "</tr>";
          }
        ?>
      </table>
    </div>
    <form action="/session/clear" method="POST">
      <button class="button-button">Done (Clears Session)</button>
      <input type='hidden' name='_session' value="<?= Session::getSessionId() //for limited security ?>" />
    </form>
  </div>
<?php include ('includes/footer.php') ?>
