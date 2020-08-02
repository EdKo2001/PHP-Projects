<?php
require_once('app/database/cofingBD.php');

if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
  $page_no = $_GET['page_no'];
} else {
  $page_no = 1;
}

$total_records_per_page = 3;
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `posts`");
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total page minus 1
?>
<div class="page-content">
  <h1 class="recent-posts-title">News</h1>
  <?php
  $sql = $conn->query("SELECT* FROM posts WHERE published='1' ORDER BY id DESC LIMIT $offset, $total_records_per_page");
  if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_assoc()) {
      echo
        ' <div class="post clearfix">
                    <img src="assets/img/' . $row['preview'] . '" class="post-image" alt="">
                    <div class="post-content">
          
                      <h2 class="post-title"><a href="single.php?post=' . $row['id'] . '">' . $row['title'] . '</a></h2>
          
                      <div class="post-info">
                        <i class="fa fa-user-o"></i> ' . $row['author'] . '
                        <i class="fa fa-calendar"></i> ' . date('F j, Y', strtotime($row['created_at'])) . '
                        <i class="fa fa-rss" aria-hidden="true"></i> ' . $row['topic'] . '
                      </div>
                      <div class="post-body">' . $row['description'] . '</div>
                      <a href="single.php?post=' . $row['id'] . '" class="read-more">Read More</a>
                    </div>
                  </div>';
    }
  }
  ?>
  <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
			<strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
		</div>
    <ul class="pagination">
			<?php if($page_no > 1){ echo "<li><a href='?page_no=1'>&#171; First</a></li>"; } 
			?>

			<li <?php if ($page_no <= 1) {
					echo "class='disabled'";
				} ?>>
				<a <?php if ($page_no > 1) {
						echo "href='?page_no=$previous_page'";
					} ?>>Previous</a>
			</li>

			<?php
			if ($total_no_of_pages <= 10) {
				for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
					if ($counter == $page_no) {
						echo "<li class='active'><a>$counter</a></li>";
					} else {
						echo "<li><a href='?page_no=$counter'>$counter</a></li>";
					}
				}
			} elseif ($total_no_of_pages > 10) {

				if ($page_no <= 4) {
					for ($counter = 1; $counter < 8; $counter++) {
						if ($counter == $page_no) {
							echo "<li class='active'><a>$counter</a></li>";
						} else {
							echo "<li><a href='?page_no=$counter'>$counter</a></li>";
						}
					}
					echo "<li><a>...</a></li>";
					echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
					echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
				} elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
					echo "<li><a href='?page_no=1'>1</a></li>";
					echo "<li><a href='?page_no=2'>2</a></li>";
					echo "<li><a>...</a></li>";
					for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
						if ($counter == $page_no) {
							echo "<li class='active'><a>$counter</a></li>";
						} else {
							echo "<li><a href='?page_no=$counter'>$counter</a></li>";
						}
					}
					echo "<li><a>...</a></li>";
					echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
					echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
				} else {
					echo "<li><a href='?page_no=1'>1</a></li>";
					echo "<li><a href='?page_no=2'>2</a></li>";
					echo "<li><a>...</a></li>";

					for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
						if ($counter == $page_no) {
							echo "<li class='active'><a>$counter</a></li>";
						} else {
							echo "<li><a href='?page_no=$counter'>$counter</a></li>";
						}
					}
				}
			}
			?>

			<li <?php if ($page_no >= $total_no_of_pages) {
					echo "class='disabled'";
				} ?>>
				<a <?php if ($page_no < $total_no_of_pages) {
						echo "href='?page_no=$next_page'";
					} ?>>Next</a>
			</li>
			<?php if ($page_no < $total_no_of_pages) {
				echo "<li><a href='?page_no=$total_no_of_pages'>Last &#187;</a></li>";
			} ?>
		</ul>
</div>