<?php
require_once('app/database/cofingBD.php');
?>

<div class="section topics">
    <h2>Topics</h2>
    <ul>
        <?php
        $sql = $conn->query("SELECT * FROM topics ORDER BY id ASC");
        if ($sql->num_rows > 0) {
            while ($row = $sql->fetch_assoc()) {
                echo
                    '<a href="topics.php?topic='.$row['name'].'">
                        <li>' . $row['name'] . '</li>
                    </a>';
            }
        }
        ?>
    </ul>
</div>