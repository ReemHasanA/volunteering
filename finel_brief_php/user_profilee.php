<?php
include 'abd/connect.php';

session_start();

// Check if the user is logged in (you can modify this part based on your authentication mechanism)
if (!isset($_SESSION['email'])) {
    header('Location: login_form.php'); // Redirect to the login page if not logged in
    exit();
}

// Get the user's email from the session
$userEmail = $_SESSION['email'];

// Fetch user data from the database
try {
    $stmt = $pdo->prepare("SELECT name, email, password FROM users WHERE email = :email");
    $stmt->bindParam(':email', $userEmail);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Check if the user data was retrieved successfully
if (!$userData) {
    die("User not found");
}

// Handle form submission to update user data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = $_POST['name'];
    $newPassword =$_POST['password']; // Hash the new password, you can add validation

    // Update user data in the database
    try {
        $updateStmt = $pdo->prepare("UPDATE users SET name = :name, password = :password WHERE email = :email");
        $updateStmt->bindParam(':name', $newName);
        $updateStmt->bindParam(':password', $newPassword);
        $updateStmt->bindParam(':email', $userEmail);
        $updateStmt->execute();
        header('Location: events.php');
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color:#ede4d6;
        }
        
        h1 {
            text-align: center;

        }
        
        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #32745c ;        }
        
        label {
            display: block;
          
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Edit Your Profile</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $userData['name']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $userData['email']; ?>" readonly><br>

        <label for="password">Password:</label>
        <input type="text" name="password" value="<?php echo $userData['password']; ?>" required><br>

        <input type="submit" value="Update">
        <a href="events.php">BACK TO HOME</a>
    </form>
</body>
</html>
