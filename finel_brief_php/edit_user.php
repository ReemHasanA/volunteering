<?php
$conn = mysqli_connect('localhost','root','','test333');


$name="";
$email="";
$password="";
$user_type="";

$errormessage="";
$sucessmessage="";

if($_SERVER["REQUEST_METHOD"]=="GET"){
     if(!isset($_GET['id'])){
        header("location:admin_user_page.php");
        exit;
     }   
     $id=$_GET['id'];

     $sql = " SELECT * FROM users WHERE id=$id ";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();

     if(!$row){
        header("location:admin_user_page.php");
        exit;
     }

     $name = $row["name"];
     $email = $row["email"];
     $password = $row["password"];
     $user_type = $row["user_type"];

}else{
        $id = $_POST["id"];
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $user_type=$_POST["user_type"];
        
        do {
             if(empty($name) || empty($email) || empty($password) || empty($user_type)){
                $errormessage = "All fields are required";
                break;
             }

              $sql = "UPDATE users" .
            " SET name = '$name', email = '$email', password = '$password',user_type = '$user_type'" .
            " WHERE id = $id;";

                    $result = $conn->query($sql);

                    if(!$result){
                        $errormessage = "Invalid query: " .mysqli_connect_error();
                        break;
                    }
                    $sucessmessage = "user updated correctly";
                    header("location:admin_user_page.php");
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
        <h2>updated user</h2>
    
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">user_type</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user_type" value="<?php echo $user_type;?>">
                </div>
            </div>
        
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="admin_user_page.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
