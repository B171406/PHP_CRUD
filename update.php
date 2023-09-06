<?php
    $conn = new mysqli('localhost', 'root', '', 'crud_php');
    $id=$_POST['id'];
    $add=$_POST['add'];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "UPDATE student SET address='$add' WHERE student_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>