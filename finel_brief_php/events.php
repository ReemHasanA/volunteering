<?php

// include 'abd/connect.php';
//     $query = "SELECT * FROM events";
//     $stmt = $pdo->query($query);
    $or="";
    $or1="";
    $WHERE="";
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <title>Event Page</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #ede4d6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        
        #container {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        
        .navbar {
            background-color: #10443e;
            color: #fff;
            padding: 27px;

            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        
        .event-card {
            width: 300px;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            max-width: 300px;
            background-color: #f9f9f9;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            height:300px;
        }
        
        .event-card h2 {
            color: #32745c;
            font-size: 1.5rem;
        }
        
        .event-card p {
            color: #62a29a;
            margin: 5px 0;
        }
        
        .event-card button {
            background-color: #b29361;
            color: #fff;
            border: none;
            padding: 10px;
            margin-top: auto;
            cursor: pointer;
        }
        
        .event-card button a {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <div class="navbar ">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                What are you looking for?
            </a>
            <ul class="dropdown-menu" style="background-color: #10443e;">

            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET" class=" p-1 m-1">
        <input type="search" name="title" placeholder="EVENT NAME" class="form-control">
        
        <input type="date" placeholder="Date" name="created_at" id="date" class="form-control">
        <select data-trigger="" name="CATEGORY" class="form-control">
          <option placeholder="" value="">CATEGORY</option>
                <option value="1">enviroment</option>
                <option value="2">social</option>
                <option value="3">health</option>
              </select>
        <button name='search'class="btn btn-outline-secondary">Search</button>
    </form>
</ul>
    <div>   
        <a href="home.php">Home</a>
        <a href="login_form.php" class="btn">logout</a>
        <a href="user_profilee.php" class="btn">Profile</a>
    </div> 
    </div>
    <div id='container'>

        

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
            echo '<div class="event-card">';
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<p>Date: ' . $row['created_at'] . '</p>';
            echo '<p>Description: ' . $row['description'] . '</p>';
            echo '<button><a href="enter_event.php?id=' . $row['events_id'] . '">view event</a></button>';
            echo '</div>';
            
        }
}else{
    echo"<h1 class='col-9 text-center'>Found Nothing</h1>";
}


        // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // }
        ?>

    </div>

</body>
</html>

</body>
</html>