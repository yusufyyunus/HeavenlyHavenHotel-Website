<?php
$servername="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$dbName="hotelmanagement"; // Database name
// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
// Define $myusername and $mypassword
$customerusername=$_POST['customerusername'];
$customerpassword=$_POST['customerpassword'];
$sql = "SELECT customerusername, customerpassword FROM loginCustomer WHERE customerusername='$customerusername' and
customerpassword='$customerpassword'";
$result = $conn->query($sql);
// Mysql_num_row is counting table row
if ($result->num_rows > 0)
{
 //redirect to file "bb.html"
 header("location:bb.html");
}
else
{
 echo "<p>Wrong Username or Password. Please try again.";
}
$conn->close();
?>