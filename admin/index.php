<?php include "db_connection.php" ?>
<!DOCTYPE html>
<html>
<?php include "layout/head.php"; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include "layout/header.php"; ?>
    <?php include "layout/leftsidebar.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
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

              $count_categories = 0;
              $sql_select_categories = "SELECT * FROM categories";
              $result_sql_select_categories = $conn->query($sql_select_categories);
              while ($rowcategories = $result_sql_select_categories->fetch_assoc()) {
                $count_categories++;
              }
              ?>
              <div class="inner">
                <h3><?php echo $count_categories; ?></h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="fa fa-server"></i>
              </div>
              <a href="category_admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <?php
              $counter_posts = 0;
              $sql_select_posts = "SELECT * FROM posts ORDER BY id desc";
              $result_sql_select_posts = $conn->query($sql_select_posts);
              while ($rowposts = $result_sql_select_posts->fetch_assoc()) {
                $counter_posts++;
              }
              ?>
              <div class="inner">
                <h3><?php echo $counter_posts; ?></h3>

                <p>Posts</p>
              </div>
              <div class="icon">
                <i class="fa fa-file"></i>
              </div>
              <a href="post_admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <?php
              $sql_select_users_all = "SELECT * FROM users ORDER BY id desc";
              $result_sql_select_users_all = $conn->query($sql_select_users_all);
              $count_all_users = 0;
              while ($rowusers_all = $result_sql_select_users_all->fetch_assoc()) {
                $count_all_users++;
              }
              ?>
              <div class="inner">
                <h3><?php echo $count_all_users; ?></h3>

                <p>Users / Admin</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="users_admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <?php
              $sql_select_comment_all = "SELECT * FROM comments ORDER BY comm_status asc";
              $result_sql_select_comment_all = $conn->query($sql_select_comment_all);
              $count_all_comments = 0;
              while ($rowcomment = $result_sql_select_comment_all->fetch_assoc()) {
                $count_all_comments++;
              }
              ?>
              <div class="inner">
                <h3><?php echo $count_all_comments ?></h3>

                <p>Comments</p>
              </div>
              <div class="icon">
                <i class="fa fa-comments"></i>
              </div>
              <a href="comment_admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->


      </section>
      <!-- /.content -->
    </div>
    <!-- Modal add new post -->
    <?php include "layout/modal/add_new_post.php"; ?>
    <!-- // Modal add new Post -->
    <?php include "layout/modal/edit_user.php" ?>
    <!-- /.content-wrapper -->
    <?php include "layout/footer.php"; ?>

    <?php include "layout/rightsidebar.php"; ?>
    <!-- ./wrapper -->

    <?php include "layout/scripts.php"; ?>
</body>

</html>