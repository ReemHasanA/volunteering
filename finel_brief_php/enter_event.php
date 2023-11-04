<?php
include 'abd/connect.php';

session_start();
$email=$_SESSION['email'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #ede4d6; /* Background color */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    h1 {
        color: #10443e; /* Text color */
    }

    p {
        color: #b29361; /* Text color */
    }

    button {
        background-color: #32745c; /* Button background color */
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    button:hover {
        background-color: #62a29a; /* Button hover color */
    }

    .comments {
        list-style: none;
        padding: 0;
    }

    .comment-item {
        color: #333;
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .comment-author {
        padding: 20px;
    }

    .comment-text {
        display: flex;
        align-items: center;
        flex: 1;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    h2 {
        color: #10443e; /* Text color */
    }

    textarea {
        width: auto;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    input[type="submit"] {
        background-color: #32745c; /* Button background color */
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #62a29a; /* Button hover color */
    }
</style>

<body>




    <?php
    if (isset($_GET['id'])) {
        $event_id = $_GET['id'];


        // -------------------------------------------------------------

        // Retrieve event details from the database based on the event_id

        // -------------------------------------------------------------


        $query = "SELECT * FROM events WHERE events_id = :event_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);

  

        $conn = mysqli_connect('localhost','root','','test333');
        $query1 = "SELECT * FROM users WHERE email = '$email'";
        $results = $conn->query($query1);
        $user=$results->fetch_assoc();
        $user_id=$user['id'];

        if ($event) {
            echo '<h1>' . $event['title'] . '</h1>';
            echo '<p> Date: ' . $event['created_at'] . '</p>';
            echo '<p> Description: ' . $event['description'] . '</p>';
            $registrationLimit = $event['participant']; 

            $conn = mysqli_connect('localhost','root','','test333');
            $sql="SELECT * FROM history WHERE events_id = $event_id";
            $result = $conn->query($sql);


            if ($result->num_rows < $registrationLimit) {
            echo '<h2>Register for Event</h2>';
            echo '<form method="post" action="">';

            $user1= $user['id'];
            $sql1="SELECT * FROM history WHERE id = $user1 AND  events_id = $event_id";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
            echo '<button name="delete" onclick="location.reload()">Disjoin event</button>';
            if (isset($_POST['delete'])) {
                $d="DELETE FROM history WHERE events_id = $event_id AND id =" .$user['id'];
            $conn->query($d);
            echo "<p> deleted</p>";
            }}else{echo '<button name="add">join event</button>';
            if (isset($_POST['add'])) {
                $sql="INSERT INTO history(id, events_id)"." VALUES ('$user1','$event_id')";
                $RES=$conn->query($sql);
                echo '<script>location.reload();</script>';

            }} }else {
                echo 'Event registration is closed.';
                }
                echo '<h2>'.$result->num_rows.' from '.$registrationLimit.'</h2>';
                echo '</form>';

        // -------------------------------------------------------------

            // getting the comments with name 

        // -------------------------------------------------------------



            $query = "SELECT users.name , comments.comment FROM users INNER JOIN comments on comments.user_id = users.id WHERE comments.event_id = :event_id AND status = 1" ;
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
            $stmt->execute();
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);



         
    if (!empty($comments)) {
        echo '<ul class="comment-list">';
        foreach ($comments as $comment) {
            echo '<li class="comment-item">';
            echo '<p class="comment-author">' . $comment['name'] . '</p>';
            echo '<p class="comment-text">' . $comment['comment'] . '</p>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No comments available.';
    }


            //  display the comments here if the status attribute == 1


            echo '<h2>Add a Comment</h2>';

            //  ---------------------------------------------------------

             // Create add_comment.php to handle comment submission

            //  -------V----V------V-------V-------V-------V-------------------


            echo '<form method="post" action="comments.php">'; 
            echo '<textarea name="comment" rows="4" cols="50"></textarea><br>';
            echo '<input type="submit" value="Submit Comment">';
            echo '<input type="hidden" name="event_id" value="' . $event_id . '">';
            echo '</form>';

            // --------------------------------------------------------------------
        
        } else {
            echo 'Event not found.';
        }
    } else {
        echo 'Event ID is missing.';
    }
    ?>
  <a class='btn btn-danger btn-sm' href='events.php'>Cancel</a>

</body>
</html>
