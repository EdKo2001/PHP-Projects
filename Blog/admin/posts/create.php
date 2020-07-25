<?php
if (!session_id()) session_start();
if (!$_SESSION['logon']) {
  header("Location:../index.php");
  die();
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

  <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <title>Admin - Create Post</title>
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
        <h2 style="text-align: center;">Create Post</h2>

        <form action="../../app/controllers/posts.php" method="post" enctype="multipart/form-data">
          <div class="input-group">
            <label>Title</label>
            <input type="text" name="title" class="text-input" required>
          </div>
          <div class="input-group">
            <label>Author</label>
            <input type="text" name="author" class="text-input">
          </div>
          <div class="input-group">
            <label>Body</label>
            <textarea class="text-input" name="description" id="editor">
            <div id="editor"></div>
            </textarea>
           
          </div>
          <div class="input-group">
            <label>Preview</label>
            <input type="file" class="text-input" name="preview"></input>
          </div>
          <div class="input-group">
            <label>Topic</label>
            <select class="text-input" name="topic">
              <?php
              require_once('../../app/database/cofingBD.php');
              $topics = $conn->query("SELECT * FROM topics ORDER BY id ASC");
              foreach ($topics as $key => $topic) : ?>
                <option value="<?= $topic['name'] ?>"><?= $topic['name'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="input-group">
            <button type="submit" name="create" class="btn">Create</button>
          </div>
        </form>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CKEditor 5 -->
  <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

  <!-- Custome Scripts -->
  <script src="../../assets/js/scripts.js"></script>

</body>

</html>