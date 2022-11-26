
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
   <div class="container">
     <a class="navbar-brand" href="index.php">E-Flix</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarResponsive">
       <ul class="navbar-nav ml-auto">
         <li class="nav-item active">
           <a class="nav-link" href="index.php">Home
             <span class="sr-only">(current)</span>
           </a>
         </li>
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
          $sql_select_category = "SELECT * FROM categories ORDER BY cat_priority asc";
  
          $result_sql_select_category = $conn->query($sql_select_category);
       
          $counter_category_post = 0;
          while ($rowcategory = $result_sql_select_category->fetch_assoc()) {

            $view_category_id = $rowcategory['id'];
            $view_cat_title = $rowcategory['cat_title'];

            $sql_select_post_for_category = "SELECT * FROM posts WHERE post_category = {$view_category_id}";
            $result_sql_select_post_for_category = $conn->query($sql_select_post_for_category);
            while ($rowpost_for_category = mysqli_fetch_assoc($result_sql_select_post_for_category)) {

              $counter_category_post++;
            }
            if ($counter_category_post > 0) {

              $counter_category_post = 0;
          ?>
             <li class="nav-item">
               <a class="nav-link" href="category.php?catid=<?= $view_category_id; ?>"><?php echo $view_cat_title; ?></a>
             </li>
         <?php
            }
          }
          
          ?>
       </ul>
     </div>
   </div>
 </nav>