<?php

session_start();

require_once('../database/cofingBD.php');

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

    if ($sql->num_rows > 0) {

        if (!session_id())
            session_start();
        $_SESSION['logon'] = true;
        setcookie('user', 'admin', time() + 36, "/");
        header('Location: ../../admin/topics/index.php');
    } else {
        header('Location: ../../admin/index.php');
    }
}
