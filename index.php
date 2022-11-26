<?php
include "admin/db_connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php include "layout/head.php"; ?>

<body>

  <!-- Navigation -->
  <?php include "layout/topnavigation.php"; ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">E-flix
          <small>Top video content for you</small>
        </h1>
        <?php

        $servername = "us-cdbr-east-06.cleardb.net";
        $username = "b657ea733237ef";
        $password = "05f24793";
        $databasename = "heroku_7d62d584a1618e6";

        $conn = new mysqli(
          $servername,
          $username,
          $password,
          $databasename

          //$cfg["Servers"][$i]["host"] = "us-cdbr-east-06.cleardb.net"; //provide hostname
          //$cfg["Servers"][$i]["user"] = "b657ea733237ef"; //user name for your remote server
          //$cfg["Servers"][$i]["password"] = "05f24793"; //password
          //$cfg["Servers"][$i]["auth_type"] = "config"; // keep it as config

        );



        $no_posts_per_page = 5;
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $start = $no_posts_per_page * $page - $no_posts_per_page;
        $sql_select_post = "SELECT * FROM posts WHERE post_status = 1 ORDER BY id desc LIMIT {$start} ,{$no_posts_per_page} ";
        $result_sql_select_post = $conn->query($sql_select_post);
        while ($rowpost = $result_sql_select_post->fetch_assoc()) {
          $view_post_id = $rowpost['id'];
          $view_post_category = $rowpost['post_category'];
          $view_post_title = $rowpost['post_title'];
          $view_post_autor = $rowpost['post_autor'];
          $view_post_date = $rowpost['post_date'];
          $view_post_edit_date = $rowpost['post_edit_date'];
          $view_post_image = $rowpost['post_image'];
          $view_post_text = $rowpost['post_text'];
          $view_post_tag = $rowpost['post_tag'];
          $view_post_visit_counter = $rowpost['post_visit_counter'];
          $view_post_status = $rowpost['post_status'];
          $view_post_priority = $rowpost['post_priority'];
        ?>
          <!-- Blog Post -->
          <div class="card mb-4">
            <!----<?php // echo $view_post_image; 
                  ?>-->
            <iframe width="560" height="315" src="https://www.youtube.com/embed/mnLqbHMJ7_I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="card-body">
              <h2 class="card-title"><?php echo $view_post_title; ?></h2>
              <p class="card-text">
                <?php //echo $view_post_text; 
                echo substr($view_post_text, 0, 400) . "..."; ?>
              </p>
              <a href="post.php?postid=<?= $view_post_id; ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <?php
            $sql_select_users_article = "SELECT * FROM users WHERE id={$view_post_autor}";
            $result_sql_select_users_article = $conn->query($sql_select_users_article);

            while ($rowusers_article = $result_sql_select_users_article->fetch_assoc()) {
              $view_users_id = $rowusers_article['id'];
              $view_users_name = $rowusers_article['name'];
              $view_users_image = $rowusers_article['image'];
            }
            ?>
            <div class="card-footer text-muted">
              <img src="admin/images/users/<?php echo $view_users_image; ?>" class="zoom3" alt="User Image" width="50" align="left" hspace="5">
              By <a href="author.php?auth=<?= $view_users_id; ?>"><?php echo $view_users_name; ?></a> <br>Web developer <a href="#">VirtuaPHP</a>
              | <?php echo $view_post_date; ?>
            </div>
          </div>
        <?php } ?>


        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <?php
            $select_post_query = "SELECT * FROM posts WHERE post_status = 1";
            $result_select_post_query = $conn->query($select_post_query);
            $sum_posts = mysqli_num_rows($result_select_post_query);

            $allpages = ceil($sum_posts / $no_posts_per_page);

            if ($page > 1) {
              $previous = $page - 1;


            ?>
              <a class="page-link" href="index.php?page=<?php echo $previous ?>">&larr; Previous</a>
            <?php } ?>
          </li>
          <li class="page-item">
            <?php
            if ($page < $allpages) {
              $next = $page + 1;
            ?>
              <a class="page-link" href="index.php?page=<?php echo $next ?>">Next &rarr;</a>
            <?php } ?>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <?php include "layout/sidebar.php"; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include "layout/footer.php"; ?>


  <!-- Bootstrap core JavaScript -->
  <script src="blog-template/vendor/jquery/jquery.min.js"></script>
  <script src="blog-template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>