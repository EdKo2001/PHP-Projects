<?php

session_start();

require_once('../../app/database/cofingBD.php');

if (isset($_POST['create'])) {

  $name = $_POST['name'];
  $description = $_POST['description'];

  $conn->query("INSERT INTO topics (name, description) VALUES ('$name','$description')");

  header('Location: ../../admin/topics/index.php');

  $_SESSION['message'] = "The topic has been created!";
  $_SESSION['msg_type'] = "success";

  exit();
}

function view()
{

  global $conn;

  $topics = $conn->query("SELECT * FROM topics ORDER BY id ASC");

  if ($topics->num_rows > 0) {
    foreach ($topics as $key => $topic) {
      echo
        '<tr class="rec">
            <td>' . ($key + 1) . '</td>
            <td>
              <a href="#">' . $topic['name'] . '</a>
            </td>
            <td>
              <a href="../../admin/topics/edit.php?edit=' . $topic['id'] . '" class="edit">
                Edit
              </a>
            </td>
            <td>
              <a href="../../admin/topics/index.php?delete=' . $topic['id'] . '" class="delete">
                Delete
              </a>
            </td>
          </tr>';
    }
  } else {
    echo '
            <tr>
                <td>
                    No Topics
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

  $conn->query("DELETE from topics WHERE id='$id'");

  $_SESSION['message'] = "The topic has been deleted!";
  $_SESSION['msg_type'] = "success";

  header('Location: ../../admin/topics/index.php');
}


if (isset($_GET['edit'])) {

  $id = $_GET['edit'];

  $topics = $conn->query("SELECT * FROM topics WHERE id='$id'");

  if (count($topics) == 1) {
    $row = $topics->fetch_array();
    $name = $row['name'];
    $description = $row['description'];
  }
}

if (isset($_POST['update'])) {

  $id = $_POST['id'];

  $name = $_POST['name'];
  $description = $_POST['description'];

  $conn->query("UPDATE topics SET name='$name', description='$description' WHERE id='$id'");

  $_SESSION['message'] = "The topic has been updated!";
  $_SESSION['msg_type'] = "success";

  header('Location: ../../admin/topics/index.php');
}
