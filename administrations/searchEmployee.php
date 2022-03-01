

<?php
require '../connection_e_wasterManagement.php';
  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT firstname FROM employee WHERE firstname LIKE :firstname';
    $stmt = $db->prepare($sql);
    $stmt->execute(['firstname' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();
    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['firstname'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Employee Not Found</p>';
    }
  }
?>