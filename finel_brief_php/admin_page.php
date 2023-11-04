<?php

// @include 'config.php';
$conn = mysqli_connect('localhost','root','','test333');

// session_start();

// if(!isset($_SESSION['admin_name'])){
//    header('location:login_form.php');
// }

$or="";
$or1="";
$WHERE="";

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <style>
    
   </style>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top ">
  <div class="container-fluid">
  <a class="navbar-brand text-white" href="done/Home.php">Volunteering</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">logout</a>
          </li>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET" class=" p-1 m-1">
        <input type="search" name="title" placeholder="EVENT NAME" class="form-control">
        <!-- <label for="Date">Date</label> -->
        <input type="date" placeholder="Date" name="created_at" id="date" class="form-control">
        <select data-trigger="" name="CATEGORY" class="form-control">
                <option placeholder="" value="">CATEGORY</option>
                <option value="1">social</option>
                <option value="2">enviroment</option>
                <option value="3">health</option>
              </select>
        <button name='search'class="btn btn-outline-secondary"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

      </div>
    </div>
  </div>
</nav>
<div class="container">

   <div class="content">
      <h3>d</h3>
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span></span></h1>
      <p>this is an admin page</p>
      <a class="btn btn-primary"  href="admin_user_page.php" role="button"> user </a><br>
      <br>
      <a class="btn btn-primary"  href="comments_event_view.php" role="button"> comments </a><br>
      <br>
      <a class="btn btn-primary" href="create_event.php" role="button">New event</a><br>

         <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>description</th>
                    <th>status</th>
                    <th>created_at</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
             $conn = mysqli_connect('localhost','root','','test333');

             
        if (isset($_GET['search'])){
            $created_at=$_GET['created_at'];
            $title=$_GET['title'];
            $CATEGORY=$_GET['CATEGORY'];
            if (!empty($created_at)||!empty($title)||!empty($CATEGORY)){$WHERE='WHERE';
            if (!empty($created_at)&&!empty($title)){$or="or";}
            if ((!empty($created_at)||!empty($title))&&!empty($CATEGORY)){$or1="or";}}
            
            else{
                echo"<h1 class='col-9 text-center'>you didn't add any thing to search</h1>";
            }
        }
            
            $sql="SELECT * FROM events ".$WHERE .
            (empty($created_at) ? "" : " created_at='$created_at' ")
            .$or.(empty($title) ? "" : " title LIKE'%$title%' ")
            .$or1.(empty($CATEGORY) ? "" : " category='$CATEGORY' ") ;
            $result = mysqli_query($conn,$sql);
            // $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            
                while ($row=$result->fetch_assoc()) {
                    echo "<tr>
                    <td>$row[events_id]</td>
                    <td>$row[title]</td>
                    <td>$row[description]</td>
                    <td>$row[status]</td>
                    <td>$row[created_at]</td>
        
                 
                    <td>
                        <a class='btn btn-primary btn-sm m-2' href='edit_event.php?id=$row[events_id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='delete_event.php?id=$row[events_id]'>Delete</a>
                        <a class='btn btn-danger btn-sm' href='event_page_view.php?id=$row[events_id]'>view</a>
                    </td>
                </tr>";
                }
        }else{
            echo"<h1 class='col-9 text-center'>Found Nothing</h1>";
        }
                ?>
            </tbody>
         </table>

   </div>

</div>

</body>
</html>

<?php


?>