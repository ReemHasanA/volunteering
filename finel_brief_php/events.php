<?php

include 'abd/connect.php';
    $query = "SELECT * FROM events";
    $stmt = $pdo->query($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
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
            justify-content: flex-end;
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
    <div id='container'>
        <div class="navbar">
            <a href="home.php">Home</a>
            <a href="login_form.php" class="btn">logout</a>
            <a href="user_profilee.php" class="btn">Profile</a>
    
        </div>

        

        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="event-card">';
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<p>Date: ' . $row['created_at'] . '</p>';
            echo '<p>Description: ' . $row['description'] . '</p>';
            echo '<button><a href="enter_event.php?id=' . $row['events_id'] . '">view event</a></button>';
            echo '</div>';
        }
        ?>

    </div>

</body>
</html>

</body>
</html>