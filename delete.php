<?php
require_once 'connection.php';

if (isset($_GET['id'])) {
  $sql = "DELETE FROM users WHERE id={$_GET['id']}";
  $connection->query($sql);
  echo "<script>var time = setTimeout(function()
        {window.location = 'index.php'}, 3000);</script>";
} else {
  echo "<script>var time = setTimeout(function()
        {window.location = 'index.php'}, 3000);</script>";
}
 ?>
