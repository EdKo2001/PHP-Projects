<?php
require_once('app/database/cofingBD.php');
?>

<div class="posts-slider">
    <h1 class="slider-title">Trending Posts</h1>
    <i class="fa fa-chevron-right next"></i>
    <i class="fa fa-chevron-left prev"></i>
    <div class="posts-wrapper">

        <?php
        $sql = $conn->query("SELECT * FROM posts WHERE published='1' ORDER BY id DESC LIMIT 6");
        if ($sql->num_rows > 0) {
            while ($row = $sql->fetch_assoc()) {
                echo
                    '<div class="post">
                            <div class="inner-post">
                            <a href="single.php?post=' . $row['id'] . '">
                            <img src="assets/img/' . $row['preview'] . '" alt="" style="height: 200px; width: 100%; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                            </a>
                <div class="post-info">
                    <h4><a href="single.php?post=' . $row['id'] . '">' . $row['title'] . '</a></h3>
                        <div>
                            <i class="fa fa-user-o"></i> ' . $row['author'] . '
                            <i class="fa fa-calendar"></i> ' . date('F j, Y', strtotime($row['created_at'])) . '
                            <i class="fa fa-rss" aria-hidden="true"></i> ' . $row['topic'] . '
                        </div>
                </div>
                </div>
        </div>
                            
                            ';
            }
        }
        ?>
    </div>
</div>