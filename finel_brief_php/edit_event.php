<?php
$conn = mysqli_connect('localhost','root','','test333');


$title="";
$description="";
$status="";
$created_at="";


$errormessage="";
$sucessmessage="";

if($_SERVER["REQUEST_METHOD"]=="GET"){
     if(!isset($_GET['id'])){
        header("location:admin_page.php");
        exit;
     }   
     $id=$_GET['id'];

     $sql = " SELECT * FROM events WHERE events_id=$id ";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();

     if(!$row){
        header("location:admin_page.php");
        exit;
     }

     $title = $row["title"];
     $description = $row["description"];
     $status = $row["status"];
     $created_at = $row["created_at"];
    //  $CATEGORY = $row["CATEGORY"];
     $participant = $row["participant"];

}else{
        $id= $_POST["events_id"];
        $title=$_POST["title"];
        $description=$_POST["description"];
        $status=$_POST['status'];
        $created_at=$_POST['created_at'];
        $CATEGORY=$_POST['CATEGORY'];
        $participant=$_POST['participant'];
        
        do {
             if(empty($title) || empty($description)  || empty($status) || empty($created_at)|| empty($CATEGORY) || empty($participant)){
                $errormessage = "All fields are required";
                break;
             }

              $sql = "UPDATE events" .
            " SET title = '$title', description = '$description', status = '$status',created_at = '$created_at',category='$CATEGORY',participant='$participant'" .
            " WHERE events_id = $id";

                    $result = $conn->query($sql);

                    if(!$result){
                        $errormessage = "Invalid query: " .mysqli_connect_error();
                        break;
                    }
                    $sucessmessage = "user updated correctly";
                    header("location:admin_page.php");
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
            <input type="hidden" name="events_id" value="<?php echo $id;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">title</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="title" value="<?php echo $title;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $description;?>">
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
                     <input type="date" placeholder="Date" name="created_at" id="date" class="form-control" value="<?php echo $created_at;?>">
                    </div>
                    </div>
                <div class="row mb-3">
                     <label class="col-sm-3 col-form-label"></label>
                         <div class="col-sm-6">
                         <select data-trigger="" name="CATEGORY" class="form-control" value="<?php echo $CATEGORY;?>">
                        <option value="">CATEGORY</option>
                        <option value="1">social</option>
                        <option value="2">enviroment</option>
                        <option value="3">health</option>
                        </select>
                </div>
                </div>
                
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Number of participant</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="participant" value="<?php echo $participant;?>">
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
    </div>
</body>
</html>