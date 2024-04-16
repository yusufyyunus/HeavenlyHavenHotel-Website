<html>
<head>
<title>Heavenly Haven Hotel</title>
</head>
<body>
 <?php

 $date = date("d-m-Y");
 //get input values from form
 extract($_POST);
 ?>
 <p>Date: <b><?php print($date) ?></b></p>
 <h3>Heavenly Haven Hotel</h3>
 <h3>Message received, thank you.</h3>
 <table>
 <tr><td>Name</td>
 <td>:</td>
 <td><b><?php print($name) ?></b></td>
 </tr>
 <tr><td>Email</td>
 <td>:</td>
 <td><b><?php print($email) ?></b></td>
 </tr>
 <tr><td>Message</td>
 <td>:</td>
 <td><b><?php print($message) ?></b></td>
 </tr>
 </table>
 <?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "hotelmanagement";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error); }
 //create query
 $sql = "INSERT INTO contact (name, email, message) 
 VALUES ('$name', '$email', '$message')";
//execute query
if ($conn->query($sql) === TRUE) {
    echo "Message received, thank you.";
    }
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //close connection
    $conn->close();
    echo '<p><a href="index.html">Home Page</a></p>';
    ?>
    <br>
    <form>
    <input type="button" name="printButton" onClick="window.print()" value="Print">
    </form>
	
          
   </body>
   </html>