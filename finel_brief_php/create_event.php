<?php



$conn = mysqli_connect('localhost','root','','test333');


$title="";
$description="";
$status="";
$created_at="";
$CATEGORY="";
$participant="";



$errormessage="";
$sucessmessage="";


if($_SERVER['REQUEST_METHOD']=="POST"){
    $title=$_POST["title"];
    $description=$_POST["description"];
    $status=$_POST['status'];
    $created_at=$_POST['created_at'];
    $CATEGORY=$_POST['CATEGORY'];
    $participant=$_POST['participant'];//


    do {
        if(empty($title) || empty($description)  || empty($created_at) || empty($status)|| empty($CATEGORY) || empty($participant)){
            $errormessage = "All the fields are required";
            break;
        }

          $sql = "INSERT INTO events (title,description,status,created_at,category,participant) 
          VALUES('$title','$description','$status','$created_at','$CATEGORY','$participant')";
          $result = $conn->query($sql);

          if(!$result){
            $errormessage = "Invalid query: " .mysqli_connect_error();
            break;
          }


          $title="";
          $description="";
          $status="";
          $created_at="";
          $CATEGORY="";
          $participant="";


         $sucessmessage="user added correctly";

         header("location:admin_page.php");
         exit();

    } while (false);
}
?>


<?php
// Your PHP code here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f5f5f5;
        }
        
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
        }

        label {
            font-weight: bold;
        }

        .form-control {
            border: 1px solid #ccc;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-outline-primary {
            color: #007bff;
            border: 1px solid #007bff;
        }

        .btn-outline-primary:hover {
            background-color: #f2f5f8;
        }

        .error-message {
            color: #dc3545;
        }

        .success-message {
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Event</h2>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $description; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="status" value="<?php echo $status; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Created At</label>
                <div class="col-sm-6">
                    <input type="date" name="created_at" class="form-control" value="<?php echo $created_at; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-6">
                    <select name="CATEGORY" class="form-select">
                        <option value="">Select Category</option>
                        <option value="1">Social</option>
                        <option value="2">Environment</option>
                        <option value="3">Health</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Number of Participants</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="participant" value="<?php echo $participant; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="admin_page.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
        <?php 
        if (!empty($errormessage)) {
            echo '<div class="error-message">' . $errormessage . '</div>';
        } else if (!empty($sucessmessage)) {
            echo '<div class="success-message">' . $sucessmessage . '</div>';
        }
        ?>
    </div>
</body>
</html>
