<?php

require_once('../database/cofingBD.php');

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

    if ($sql->num_rows > 0) {

        session_start();
        $_SESSION['logon'] = true;
        $_SESSION['start'] = time(); // Taking now logged in time.
        // Ending a session in 30 minutes from the starting time.
        $_SESSION['expire'] = $_SESSION['start'] + (120 * 60);
        header('Location: ../../admin/posts/index.php');
    } else {
        header('Location: ../../admin/index.php');
    }
}
