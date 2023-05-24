<?php
// Check if a file was uploaded
if (isset($_FILES['file'])) {
  $file = $_FILES['file'];

  // Establish a database connection
  $conn = new mysqli('localhost', 'root', '', 'contribute');

  // Check the database connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the database query
  $stmt = $conn->prepare("INSERT INTO files (file_data) VALUES (?)");
  $stmt->bind_param("b", $fileData);
  $fileData = file_get_contents($file['tmp_name']);
  $stmt->execute();
  // Close the database connection
  $stmt->close();
  $conn->close();

  // Send a response to the client
  echo 'File uploaded successfully.';
}
?>