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
 <h3>Registered</h3>
 <table>
 <tr><td>Username</td>
 <td>:</td>
 <td><b><?php print($customerusername) ?></b></td>
 </tr>
 <tr><td>Password</td>
 <td>:</td>
 <td><b><?php print($customerpassword) ?></b></td>
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
 $sql = "INSERT INTO loginCustomer (customerusername, customerpassword) 
 VALUES ('$customerusername', '$customerpassword')";
//execute query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    }
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //close connection
    $conn->close();
    ?>
    <br>
    <form>
    <input type="button" name="printButton" onClick="window.print()" value="Print">
    </form>
	
          
    <button type="button" href="loginCustomer.html"><a href="loginCustomer.html">Login</a></button>
   </body>
   </html>