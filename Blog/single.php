<?php
  include('path.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- Custom Styles -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title>Motivational Blog</title>
</head>

<body>

  <!-- header -->
  <?php include(ROOT_PATH . '/app/includes/header.php') ?>
  <!-- // header -->

  <!-- Page wrapper -->
  <div class="page-wrapper">
    <?php
    require_once(ROOT_PATH . '/app/database/cofingBD.php');
    if (isset($_GET['post'])) {
      $id = $_GET['post'];
      $sql = $conn->query("SELECT * FROM posts WHERE id='$id'");
    }

    while ($row = mysqli_fetch_assoc($sql)) {
      $title = $row['title'];
      $description = $row['description'];
    }



    ?>
    <!-- content -->
    <div class="content clearfix">
      <div class="page-content single">
        <h2 style="text-align: center;"><?= $title ?></h2>
        <br>
        <?= $description ?>


      </div>
      <!-- signle sidebar-->
      <?php include(ROOT_PATH . '/app/includes/single-sidebar.php') ?>
      <!-- //signle sidebar-->

    </div>
  </div>
  <!-- // content -->

  </div>
  <!-- // page wrapper -->

  <!-- FOOTER -->
  <?php include(ROOT_PATH . '/app/includes/footer.php') ?>
  <!-- // FOOTER -->


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick JS -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <script src="assets/js/scripts.js"></script>

</body>

</html>