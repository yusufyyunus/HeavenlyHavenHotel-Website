<html>
<head>
<title>Creative Multimedia Competition 2020</title>
</head>
<body>
 <?php

 $date = date("d-m-Y");
 //get input values from form
 extract($_POST);
 ?>
 <p>Date: <b><?php print($date) ?></b></p>
 <h3>Heavenly Haven Hotel</h3>
 <h3>Invoice</h3>
 <table>
 <tr><td>Customer Name</td>
 <td>:</td>
 <td><b><?php print($customerName) ?></b></td>
 </tr>
 <tr><td>Customer Email</td>
 <td>:</td>
 <td><b><?php print($customerEmail) ?></b></td>
 </tr>
 <tr><td>Rooms</td>
 <td>:</td>
 <td><b><?php print($Rooms) ?></b></td>
 </tr>
 <tr><td>Number of rooms</td>
 <td>:</td>
 <td><b><?php print($numberOfRooms) ?></b></td>
 </tr>
 <tr><td>Number Of guests</td>
 <td>:</td>
 <td><b><?php print($numberOfGuests) ?></b></td>
 </tr>
 <tr><td>Date</td>
 <td>:</td>
 <td><b><?php print($date) ?></b></td>
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
 $sql = "INSERT INTO customer (customerName, customerEmail, Rooms,  numberOfRooms, numberOfGuests, date) 
 VALUES ('$customerName', '$customerEmail', '$Rooms',  '$numberOfRooms', '$numberOfGuests', '$date')";
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
	
          <button type="button" href="payment.html"><a href="payment.html">Payment</a></button>
	
   </body>
   </html>