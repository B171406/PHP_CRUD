<?php
$conn=new mysqli('localhost','root','','crud_php');
if(!$conn){
    die("err");
}
$id=$_POST['id'];
$sql="DELETE FROM student WHERE student_id=$id";
if($conn->query($sql)){
    echo("deleted successfully");
} 
else{
    echo("err");
}
?>