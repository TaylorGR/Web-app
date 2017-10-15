<?php
$member = $_POST['todelete'];
echo "<h1>Deleting member " . $member . "</h1>";

$mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
if ($mysqli->connect_errno)
{
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}

$sql = "DELETE FROM players WHERE memberid='" . $member . "'";

if ($mysqli->query($sql) === TRUE)
{
echo "\nMember removed successfully";
}
else 
{
echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>