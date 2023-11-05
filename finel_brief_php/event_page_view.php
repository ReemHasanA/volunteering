<?php

@include 'config.php';

$id = "";
$name = "";
$events_id = "";
$title = "";
$description = "";
$created_at  = "";

$errormessage = "";
$sucessmessage = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET['id'])) {
        header("location:admin_page.php");
        exit;
    }
    $id = $_GET['id'];

    $sql = "SELECT users.id,users.name,history.events_id,events.title,events.description,events.created_at FROM users INNER JOIN history ON users.id = history.id JOIN events ON history.events_id=events.events_id WHERE events.events_id=$id";
    $result = $conn->query($sql);

    if (!$result) {
        header("location:admin_page.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Page</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ede4d6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .content {
            text-align: center;
            padding: 20px;
        }

        h3 {
            color: #10443e;
        }

        h1 {
            color: #32745c;
        }

        p {
            color: #62a29a;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #b29361;
        }

        th {
            background-color: #10443e;
            color: #ede4d6;
        }

        td {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #32745c;
            color: #ede4d6;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>Hi, <span>admin</span></h3>
            <h1>Welcome</h1>
            <p>This is an event page</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Events_id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[events_id]</td>
                            <td>$row[title]</td>
                            <td>$row[description]</td>
                            <td>$row[created_at]</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a href="admin_page.php" class="btn">Back</a>
        </div>
    </div>
</body>
</html>
