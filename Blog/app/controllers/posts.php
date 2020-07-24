<?php

session_start();

require_once('../../app/database/cofingBD.php');

if (isset($_POST['create'])) {
  $image_name =  $_FILES['preview']['name'];
  $destination = "../../assets/img/" . $image_name;

  $result = move_uploaded_file($_FILES['preview']['tmp_name'], $destination);

  $_POST['preview'] = $image_name;


  $title = $_POST['title'];
  $author = $_POST['author'];
  $description = $_POST['description'];
  $topic = $_POST['topic'];
  $publish = 1;

  $conn->query("INSERT INTO posts (title, author, preview, description, topic, published) VALUES ('$title', '$author', '$image_name', '$description', '$topic', '$publish')");

  header('Location: ../../admin/posts/index.php');

  $_SESSION['message'] = "The post has been created!";
  $_SESSION['msg_type'] = "success";

  exit();
}

function view()
{

  global $conn;

  $posts = $conn->query("SELECT * FROM posts WHERE published='1' ORDER BY id ASC");

  if ($posts->num_rows > 0) {
    foreach ($posts as $key => $post) {
      echo
        '<tr class="rec">
            <td>' . ($key + 1) . '</td>
            <td>
              <a href="#">' . $post['title'] . '</a>
            </td>
            <td>' . $post['author'] . '</td>
            <td>
              <a href="../../admin/posts/edit.php?edit=' . $post['id'] . '" class="edit">
                Edit
              </a>
            </td>
            <td>
              <a href="../../admin/posts/index.php?delete=' . $post['id'] . '" class="delete">
                Delete
              </a>
            </td>
            <td>
            <a href="../../admin/posts/drafts.php?unpublish=' . $post['id'] . '" class="publish">
              Unpublish
            </a>
          </td>
          </tr>';
    }
  } else {
    echo '
            <tr>
                <td>
                    No Posts
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        ';
  }
}

function unpublished()
{
  global $conn;

  $posts = $conn->query("SELECT * FROM posts WHERE published='0' ORDER BY id ASC");

  if ($posts->num_rows > 0) {
    foreach ($posts as $key => $post) {
      echo
        '<tr class="rec">
            <td>' . ($key + 1) . '</td>
            <td>
              <a href="#">' . $post['title'] . '</a>
            </td>
            <td>' . $post['author'] . '</td>
            <td>
              <a href="../../admin/posts/edit.php?edit=' . $post['id'] . '" class="edit">
                Edit
              </a>
            </td>
            <td>
              <a href="../../admin/posts/index.php?delete=' . $post['id'] . '" class="delete">
                Delete
              </a>
            </td>
            <td>
            <a href="../../admin/posts/index.php?publish=' . $post['id'] . '" class="publish">
              Publish
            </a>
          </td>
          </tr>';
    }
  } else {
    echo '
            <tr>
                <td>
                    No Posts
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        ';
  }
}
if (isset($_GET['delete'])) {

  $id = $_GET['delete'];

  $conn->query("DELETE from posts WHERE id='$id'");

  $_SESSION['message'] = "The topic has been deleted!";
  $_SESSION['msg_type'] = "success";

  header('Location: ../../admin/posts/index.php');
}

if (isset($_GET['unpublish'])) {

  $id = $_GET['unpublish'];

  $conn->query("UPDATE posts SET published='0' WHERE id='$id'");

  $_SESSION['message'] = "The post has been unpublished!";
  $_SESSION['msg_type'] = "success";
}

if (isset($_GET['publish'])) {

  $id = $_GET['publish'];

  $conn->query("UPDATE posts SET published='1' WHERE id='$id'");

  $_SESSION['message'] = "The post has been published!";
  $_SESSION['msg_type'] = "success";
}



if (isset($_GET['edit'])) {

  $id = $_GET['edit'];

  $sql = $conn->query("SELECT * FROM posts WHERE id='$id'");

  if (count($sql) == 1) {
    $row = $sql->fetch_array();
    $title = $row['title'];
    $author = $row['author'];
    $preview = $row['preview'];
    $description = $row['description'];
    $selectedTopic = $row['topic'];
  }
}

if (isset($_POST['update'])) {

  $id = $_POST['id'];

  $image_name =  $_FILES['preview']['name'];
  $destination = "../../assets/img/" . $image_name;

  $result = move_uploaded_file($_FILES['preview']['tmp_name'], $destination);

  $_POST['preview'] = $image_name;

  $title = $_POST['title'];
  $author = $_POST['author'];
  $description = $_POST['description'];
  $selectedTopic = $_POST['topic'];

  $conn->query("UPDATE posts SET title='$title', description='$description', author = '$author', preview = '$image_name', topic = '$selectedTopic' WHERE id='$id'");

  $_SESSION['message'] = "The post has been updated!";
  $_SESSION['msg_type'] = "success";

  header('Location: ../../admin/posts/index.php');
}

