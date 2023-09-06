<?php
echo "<h1>STUDENT DATA</h1>";
// connect the database
$conn = new mysqli('localhost', 'root', '', 'crud_php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define your SQL query to select data from your table
$sql = "SELECT student_id, name, email, address, mobile FROM student"; // Replace "your_table" with your actual table name

// Execute the SQL query
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Loop through the results and fetch each row as an associative array

            echo '<table border="1">';
            echo '<tr>';
            echo '<th>Student ID</th>';
            echo '<th>Name</th>';
            echo '<th>Email</th>';
            echo '<th>Address</th>';
            echo '<th>Mobile</th>';
            echo '</tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["student_id"] . '</td>';
            echo '<td>' . $row["name"] . '</td>';
            echo '<td>' . $row["email"] . '</td>';
            echo '<td>' . $row["address"] . '</td>';
            echo '<td>' . $row["mobile"] . '</td>';
            echo '</tr>';
            
        }
    } else {
        echo "No results found";
    }

    // Close the result set
    $result->close();
} else {
    echo "Error executing the query: " . $conn->error;
}


// Close the database connection
$conn->close();
?>