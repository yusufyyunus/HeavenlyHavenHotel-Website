<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "hotelmanagement";
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }

 //escape special characters in a string
 $customerName = mysqli_real_escape_string($conn, $_POST['customerName']);
 //create and execute query
 $sql = "SELECT * FROM customer WHERE customerName= '$customerName'";
 $result = $conn->query($sql);
 //check if records were returned
 if ($result->num_rows > 0) {
 //create a table to display the record
 echo 'Selected record as the following: <br><br>';
 echo '<p><table cellpadding=10 cellspacing=0 border=1 align="center">';
 echo '<tr><td align="center"><b>No</b></td>
 <td align="center"><b>Customer Name</b></td>
 <td align="center"><b>Customer Email</b></td>
 <td align="center"><b>Rooms</b></td>
 <td align="center"><b>Number Of Rooms</b></td>
 <td align="center"><b>Number Of Guests</b></td>
 <td align="center"><b>Date</b></td>
 <td align="center">&nbsp&nbsp</td>
 </tr>';

 // output data of each row
 while($row = $result->fetch_assoc()) {
 echo '<tr>';
 echo '<td align="center">'.$row["Bil"].'</td>';
 echo '<td align="center">'.$row["customerName"].'</td>';
 echo '<td align="center">'.$row["customerEmail"].'</td>';
 echo '<td align="center">'.$row["Rooms"].'</td>';
 echo '<td align="center">'.$row["numberOfRooms"].'</td>';
 echo '<td align="center">'.$row["numberOfGuests"].'</td>';
 echo '<td align="center">'.$row["date"].'</td>';
 echo "<td align='center'><a href='updateRecord.php?pid=$row[customerName]'> UPDATE </a>
 </td>";
 echo '</tr>';
 }
 echo '</table></p>';
 }
 else {
 echo '<font color=red>No record found';
 }
 //close connection
 $conn->close();
?>