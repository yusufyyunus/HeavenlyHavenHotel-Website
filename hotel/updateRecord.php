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

$message = "";

if (count($_POST) > 0) {
    $customerName = $_POST['customerName'];
    $customerEmail = $_POST['customerEmail'];
    $Rooms = $_POST['Rooms'];
    $numberOfRooms = $_POST['numberOfRooms'];
    $numberOfGuests = $_POST['numberOfGuests'];
    $date = $_POST['date'];

    $sql = "UPDATE customer SET customerEmail='$customerEmail', Rooms='$Rooms', numberOfRooms='$numberOfRooms', numberOfGuests='$numberOfGuests', date='$date' WHERE customerName='$customerName'";

    if ($conn->query($sql) === TRUE) {
        $message = "<p style='color:green;'>Record Modified Successfully!</p>";
    } else {
        $message = "<p style='color:red;'>Error updating record: " . $conn->error . "</p>";
    }
}

if (isset($_GET['customerName'])) {
    $customerName = $_GET['customerName'];
    $result = $conn->query("SELECT * FROM customer WHERE customerName='$customerName'");
    $row = $result->fetch_assoc();
} else {
    $row = array(); // Empty row if customerName is not set
}

$conn->close();
?>

<html>
<head>
    <title>Update Customer Data</title>
</head>
<body>
    <form name="frmUser" method="post" action="updateRecord.php">
        <div><?php if(isset($message)) echo $message; ?></div>
        <div style="padding-bottom:5px">
            <a href="competitionList.php">Customer List</a>
        </div>
        Customer Name:
        <input type="text" name="customerName" value="<?php echo isset($row['customerName']) ? $row['customerName'] : ''; ?>"><br>
        Customer Email:
        <input type="text" name="customerEmail" value="<?php echo isset($row['customerEmail']) ? $row['customerEmail'] : ''; ?>"><br>
        Rooms:
        <input type="text" name="Rooms" value="<?php echo isset($row['Rooms']) ? $row['Rooms'] : ''; ?>"><br>
        Number of Rooms:
        <input type="text" name="numberOfRooms" value="<?php echo isset($row['numberOfRooms']) ? $row['numberOfRooms'] : ''; ?>"><br>
        Number of Guests:
        <input type="text" name="numberOfGuests" value="<?php echo isset($row['numberOfGuests']) ? $row['numberOfGuests'] : ''; ?>"><br>
        Date:
        <input type="text" name="date" value="<?php echo isset($row['date']) ? $row['date'] : ''; ?>"><br>
        <input type="submit" name="submit" value="Submit" class="button">
    </form>
</body>
</html>
