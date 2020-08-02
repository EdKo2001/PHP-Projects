<?php
include('../../path.php');

if (isset($_POST['search'])) {
  echo "ok";
}

header('Location: '.BASE_URL.'/search.php');
?>