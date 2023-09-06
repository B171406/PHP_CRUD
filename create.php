<?php
$conn = new mysqli('localhost', 'root', '', 'crud_php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    $sql = "INSERT INTO student (student_id, name, email, address, mobile) VALUES (?, ?, ?, ?, ?)";
    
    // Prepare the SQL query
    $stmt = $conn->prepare($sql);

    // Check if the prepare was successful
    if ($stmt) {
        // Bind parameters with appropriate data types
        $stmt->bind_param("issss", $student_id, $name, $email,  $address,$mobile,);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Record inserted successfully.";
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error preparing query: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
