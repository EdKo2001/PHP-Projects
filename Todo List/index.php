<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel=stylesheet type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="inputBox">
            <h1>Todo list</h1>
            <form action="add.php" method="post">
                <input type="text" name="task" placeholder="What to do" autocomplete="off">
                <button type="submit">Submit</button>
            </form>
        </div>
        <?php 
            require 'configBD.php';

            $sql = $conn->query("SELECT * FROM tasks ORDER BY id ASC");
            while($row = $sql->fetch_assoc()) {
                echo 
                '<li>
                    <b>'.$row['task'].'</b>
                    <a href="remove.php?id='.$row['id'].'"><button class="remove">REMOVE</button></a>
                </li>'
                ;
            }
        ?>
    </div>
</body>
</html>