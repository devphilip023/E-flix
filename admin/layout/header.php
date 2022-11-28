<header class="main-header">
  <!-- Logo -->
  <a href="index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>P</b>HP</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>E-</b>Flix</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <?php
        $sql_select_new_comment = "SELECT * FROM comments WHERE comm_status=0";

        $result_sql_select_new_comment = $conn->query($sql_select_new_comment);
        $count_new_comments = 0;
        while ($rowcomment = $result_sql_select_new_comment->fetch_assoc()) {
          $count_new_comments++;
        }
        ?>
        <li><a href="comment_admin.php">

            <i class="fa fa-comment"></i>
            <span class="label label-success"><?php echo $count_new_comments; ?></span>
          </a></li>
        <li data-toggle="modal" data-target="#InsertPost"><a href="#">
            <i class="fa fa-plus"></i><span class="hidden-xs"> Add post</span>
          </a></li>
        <!-- Modal add new post -->
        <?php //include "layout/modal/add_new_post.php"; 
        ?>
        <!-- // Modal add new Post -->

        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
        </li>
        
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->