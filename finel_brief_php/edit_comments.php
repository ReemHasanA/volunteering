<?php
$conn = mysqli_connect('localhost','root','','test333');


$comment="";
$user_id="";
$status="";
$created_at="";
$event_id="";


$errormessage="";
$sucessmessage="";

if($_SERVER["REQUEST_METHOD"]=="GET"){
     if(!isset($_GET['id'])){
        header("location:comments_event_view.php");
        exit;
     }   
     $id=$_GET['id'];

     $sql = " SELECT * FROM comments WHERE comments_id=$id ";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();

     if(!$row){
        header("location:comments_event_view.php");
        exit;
     }

     $comment = $row["comment"];
     $user_id = $row["user_id"];
     $status = $row["status"];
     $created_at = $row["created_at"];
     $event_id = $row["event_id"];

}else{
        $id= $_POST["comments_id"];
        $comment=$_POST["comment"];
        $user_id=$_POST["user_id"];
        $status=$_POST['status'];
        $created_at=$_POST['created_at'];
        $event_id=$_POST['event_id'];
        
        
        do {
             if(empty($comment) || empty($user_id)  || empty($status) || empty($created_at)|| empty($event_id)){
                $errormessage = "All fields are required";
                break;
             }

              $sql = "UPDATE comments" .
            " SET comment = '$comment', user_id = '$user_id', status = '$status',created_at = '$created_at',event_id='$event_id'" .
            " WHERE comments_id = $id";

                    $result = $conn->query($sql);

                    if(!$result){
                        $errormessage = "Invalid query: " .mysqli_connect_error();
                        break;
                    }
                    $sucessmessage = "user updated correctly";
                    header("location:comments_event_view.php");
                    exit;
        } while (true);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>updated event</h2>
    
        <form method="post">
            <input type="hidden" name="comments_id" value="<?php echo $id;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">comment</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="comment" value="<?php echo $comment;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">user_id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user_id" value="<?php echo $user_id;?>">
                </div>
            </div>
           
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">status</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="status" value="<?php echo $status;?>">
                </div>
            </div>
            <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">created_at</label>
                    
                 <div class="col-sm-6">
                     <input type="text" placeholder="Date" name="created_at" id="date" class="form-control" value="<?php echo $created_at;?>">
                    </div>
                    </div>
                    <div class="row mb-3">
                <label class="col-sm-3 col-form-label">event_id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="event_id" value="<?php echo $event_id;?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="comments_event_view.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>