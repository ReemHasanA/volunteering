<!DOCTYPE html>
<html>
<head>
    <title>Event Search</title>
</head>
<body>
    <h1>Event Search</h1>
    <form method="post" action="search.php">
        <input type="text" name="search" placeholder="Search by description">
        <input type="submit" value="Search">
    </form>
</body>
</html>
<?php
include 'abd/connect.php'; // Include your database connection file (connect.php)

if (isset($_POST['search'])) {
    $search = $_POST['search'];

        $sql = "SELECT * FROM events WHERE description LIKE :search";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':search' => "%$search%"]);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($results) > 0) {
            echo "<h2>Search Results</h2>";
            echo "<table>";
            echo "<tr><th>Event Name</th><th>Description</th></tr>";
            foreach ($results as $row) {
                echo "<tr><td>{$row['title']}</td><td>{$row['description']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No matching events found.";
        }
   
}
?>