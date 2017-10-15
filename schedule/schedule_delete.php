<?php
$Schedule = $_POST['todelete'];
echo "<h1>Deleting Schedule " . $game . "</h1>";

$mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
if ($mysqli->connect_errno)
{
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}

$sql = "DELETE FROM Schedule WHERE gameid='" . $schedule . "'";

if ($mysqli->query($sql) === TRUE)
{
echo "Schedule removed successfully ";
}
else 
{
echo "Error: " . $sql . "<br>" . $mysqli->error;
}
echo "<br><a href='schedule_rud.php'>Back</a>";
?>