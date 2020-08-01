<?php
session_start();
if (!$_SESSION['logon']) {
  header("Location:../index.php");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="../../assets/css/admin.css">

  <title>Admin - Edit Post</title>
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
      <div class="button-group">
        <a href="create.php" class="btn btn-sm">Add Post</a>
        <a href="index.php" class="btn btn-sm">Manage Posts</a>
        <a href="drafts.php" class="btn btn-sm">Manage Drafts</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Edit Post</h2>
        <?php require_once('../../app/controllers/posts.php') ?>
        <form action="../../app/controllers/posts.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="input-group">
            <label>Title</label>
            <input type="text" name="title" class="text-input" value="<?= $title ?>" required>
          </div>
          <div class="input-group">
            <label>Author</label>
            <input type="text" name="author" class="text-input" value="<?= $author ?>">
          </div>
          <div class="input-group">
            <label>Body</label>
            <textarea class="text-input" name="description" id="body">
            <?= $description ?>
            </textarea>
          </div>
          <div class="input-group">
            <label>Preview</label>
            <input type="file" class="text-input" name="preview" capture="<?= $preview ?>"><?= $preview ?></input>
          </div>
          <div class="input-group">
            <label>Topic</label>
            <select class="text-input" name="topic">
              <option value="<?= $selectedTopic ?>" selected><?= $selectedTopic ?></option>
              <?php
              require_once('../../app/database/cofingBD.php');
              $topics = $conn->query("SELECT * FROM topics ORDER BY id ASC");
              foreach ($topics as $key => $topic) {
                if ($selectedTopic != $topic['name']) {
                  echo '<option value="' . $topic['name'] . '">' . $topic['name'] . '</option>';
                }
              }
              ?>
            </select>
          </div>
          <div class="input-group">
            <button type="submit" name="update" class="btn">Update Post</button>
          </div>
        </form>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Tinymce 5 -->
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <!-- Custome Scripts -->
  <script src="../../assets/js/scripts.js"></script>

</body>

</html>