<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Page</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
   <div class="content">
      <table class="table table-striped">
         <thead class="thead-dark">
            <tr>
               <th>comments_id</th>
               <th>comment</th>
               <th>user_id</th>
               <th>status</th>
               <th>created_at</th>
               <th>event_id</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'test333');

            if (!$conn) {
               die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM comments";
            // Execute the query
            $result = $conn->query($sql);
            // Check if the query is executed
            if (!$result) {
               die("Invalid Query: " . mysqli_connect_error());
            }

            while ($row = $result->fetch_assoc()) {
               echo "<tr>
                    <td>$row[comments_id]</td>
                    <td>$row[comment]</td>
                    <td>$row[user_id]</td>
                    <td>$row[status]</td>
                    <td>$row[created_at]</td>
                    <td>$row[event_id]</td>
                    <td>
                        <a class='btn btn-primary btn-sm m-2' href='edit_comments.php?id=$row[comments_id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='delete_comments.php?id=$row[comments_id]'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
         </tbody>
      </table>
      <a href="admin_page.php" class="btn btn-secondary">Back</a>
   </div>
</div>
</body>
</html>
