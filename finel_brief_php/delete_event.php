<?php
      if(isset($_GET["id"])){
        $id = $_GET["id"];

        $conn = mysqli_connect('localhost','root','','test333');


        $sql = "DELETE FROM events WHERE events_id=$id";
        $result = $conn->query($sql);
      }
      header("location:admin_page.php");
      exit;

?>