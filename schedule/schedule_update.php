<?php
    $eventid = $_POST['eventid'];
    $venue = $_POST['venue'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $desc = $_POST['desc'];
    $capacity = $_POST['capacity'];

    $mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
    if ($mysqli->connect_errno)
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        die();
    }
$sql = "UPDATE Schedule SET eventvenue = '$venue', eventstart = '$start', eventend = '$end', eventdesc = '$desc', eventcapacity = '$capacity'
WHERE eventid = '$eventid'";

if ($mysqli->query($sql) === TRUE)
{
    echo "\nSchedule updated successfully!";
}
else 
{
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
echo "<br><a href='schedule_rud.php'>Back</a>";
?>