<?php
      if(isset($_GET["id"])){
        $id = $_GET["id"];

        $conn = mysqli_connect('localhost','root','','test333');


        $sql = "DELETE FROM users WHERE id=$id";
        $result = $conn->query($sql);
      }
      header("location:admin_user_page.php");
      exit;

?>