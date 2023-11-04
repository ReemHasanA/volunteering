<?php


$conn = mysqli_connect('localhost','root','','test333');



$name="";
$email="";
$password="";
$user_type="";



$errormessage="";
$sucessmessage="";


if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST['password'];
    $user_type=$_POST["user_type"];


    do {
        if(empty($name) || empty($email) || empty($password) || empty($user_type)){
            $errormessage = "All the fields are required";
            break;
        }

          $sql = "INSERT INTO users (name,email,password,user_type) 
          VALUES('$name','$email','$password','$user_type')";
          $result = $conn->query($sql);

          if(!$result){
            $errormessage = "Invalid query: " .mysqli_connect_error();
            break;
          }


          $name="";
          $email="";
          $password="";
          $user_type="";


         $sucessmessage="user added correctly";

         header("location:admin_user_page.php");
         exit();

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMAIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    <title>My shop</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>New user</h2>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
            </div>
                 <div class="row mb-3">
                <label class="col-sm-3 col-form-label">email</label>
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
