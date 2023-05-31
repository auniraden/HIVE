<?php
function generateMemberID($lastInsertedId)
{
    $numericPart = str_pad($lastInsertedId + 1, 2, '0', STR_PAD_LEFT);
    return 'M' . $numericPart;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        // Passwords do not match, redirect back to the form page
        $_SESSION['error'] = "Passwords do not match";
        header("Location:RegisterPage.php");
        exit();
    }

    // Database credentials
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "hive";

    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbpassword);

    // Check if the username already exists in the database
    $query = "SELECT COUNT(*) as count FROM member WHERE name = :name";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {
        // Username already exists, redirect back to the form page with an error message
        $_SESSION['error'] = "Username already exists";
        header("Location: RegisterPage.php?error=Username already exists");
        exit();
    }

    // Check if the email already exists in the database
    $query = "SELECT COUNT(*) as count FROM member WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {
        // Email already exists, redirect back to the form page with an error message
        $_SESSION['error'] = "Email already exists";
        header("Location: RegisterPage.php?error=Email already exists");
        exit();
    }

    // Get the last inserted ID from the members table
    $query = "SELECT memberID FROM member ORDER BY memberID DESC LIMIT 1";
    $result = $conn->query($query);

    // Check if any rows were returned
    if ($result->rowCount() > 0) {
        // Fetch the last inserted ID
        $row = $result->fetch();
        $lastInsertedId = intval(substr($row['memberID'], 1)); // Extract the numeric part
    } else {
        // No rows found, set lastInsertedId to 0
        $lastInsertedId = 0;
    }

    // Generate the new memberID
    $memberID = generateMemberID($lastInsertedId);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO member (memberID, name, email, password) VALUES (:memberID, :name, :email, :password);");

    // Bind the form data to the statement parameters
    $stmt->bindParam(':memberID', $memberID);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    // Execute the statement
    $stmt->execute();

    // Close the database connection
    $conn = null;

    // Redirect to a success page
    header("Location: loginPage.php");
    exit();
}
?>