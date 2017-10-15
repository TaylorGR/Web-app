<?php
$Venue = $_POST['venue'];
$Start = $_POST['start'];
$End = $_POST['End'];
$Desc = $_POST['eventdesc'];
$Capacity = $_POST['capacity'];

$mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
if ($mysqli->connect_errno) {
    echo "Failed to connect to the database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}
    $sql = "INSERT INTO Schedule (EventVenue, EventStart, EventEnd, EventDesc, EventCapacity)
    VALUES ('$Venue', '$Start', '$End', '$Desc', '$Capacity')";

if ($mysqli->query($sql) === true) {
    echo "\nNew schedule created successfully ";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
echo "<br><a href='schedule_form.html'>Back</a>";
?>