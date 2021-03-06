<?php
session_start();
if (!$_SESSION['logon']) {
  header("Location:../../index.php");
  die();
}
$now = time(); // Checking the time now when home page starts.
if ($now > $_SESSION['expire']) {
  session_destroy();
  header("Location:../../index.php");
}
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
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="../../assets/css/admin.css">

  <title>Admin - Manage Drafts</title>
</head>

<body id="admin">

  <!-- header -->
  <?php include('../../app/includes/header.php') ?>
  <!-- // header -->

  <div class="admin-wrapper clearfix">
    <!-- Left Sidebar -->
    <div class="left-sidebar">
      <ul>
        <li><a href="index.php">Manage Posts</a></li>
        <li><a href="../topics/index.php">Manage Topics</a></li>
      </ul>
    </div>
    <!-- // Left Sidebar -->

    <!-- Admin Content -->
    <div class="admin-content clearfix">
      <?php if (isset($_SESSION['message'])) : ?>
        <div class="msg <?= $_SESSION['msg_type'] ?>">
          <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
          ?>
        </div>
      <?php endif ?>
      <div class="button-group">
        <a href="create.php" class="btn btn-sm">Add Post</a>
        <a href="index.php" class="btn btn-sm">Manage Posts</a>
        <a href="index.php" class="btn btn-sm">Manage Drafts</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Manage Drafts</h2>
        <table>
          <thead>
            <th>N</th>
            <th>Title</th>
            <th>Author</th>
            <th colspan="3">Action</th>
          </thead>
          <tbody>
            <?php require_once('../../app/controllers/view-unpublished.php') ?>
          </tbody>
        </table>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="../../assets/js/scripts.js"></script>

</body>

</html>