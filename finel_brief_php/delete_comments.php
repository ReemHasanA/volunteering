<?php
      if(isset($_GET["id"])){
        $id = $_GET["id"];

        $conn = mysqli_connect('localhost','root','','test333');


        $sql = "DELETE FROM comments WHERE comments_id=$id";
        $result = $conn->query($sql);
      }
      header("location:comments_event_view.php");
      exit;

?>