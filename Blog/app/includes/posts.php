<?php
require_once('app/database/cofingBD.php');
?>
<div class="page-content">
    <h1 class="recent-posts-title">News</h1>
    <?php
    $sql = $conn->query("SELECT* FROM posts WHERE published='1' ORDER BY id DESC" );
    if ($sql->num_rows > 0) {
        while ($row = $sql->fetch_assoc()) {
            echo
                ' <div class="post clearfix">
                    <img src="assets/img/'.$row['preview'].'" class="post-image" alt="">
                    <div class="post-content">
          
                      <h2 class="post-title"><a href="signle.php='.$row['id'].'">'.$row['title'].'</a></h2>
          
                      <div class="post-info">
                        <i class="fa fa-user-o"></i> '.$row['author'].'
                        <i class="fa fa-calendar"></i> ' . $row['created_at'] . '
                            <i class="fa fa-rss" aria-hidden="true"></i> ' . $row['topic'] . '
                      </div>
                      <p class="post-body">
                      '.$row['description'].'
                      </p>
                      <a href="'.$row['id'].'" class="read-more">Read More</a>
                    </div>
                  </div>';
        }
    }
    ?>
</div>
