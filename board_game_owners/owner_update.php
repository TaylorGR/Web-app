<?php
    $gameid = $_POST['gameid'];
    $name = $_POST['name'];
    $notes = $_POST['notes'];
    $position = $_POST['position'];

    $mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
    if ($mysqli->connect_errno)
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        die();
    }
$sql = "UPDATE Board_games SET name = '$name', position = '$position', notes = '$notes'
WHERE gameid = '$gameid'";

if ($mysqli->query($sql) === TRUE)
{
    echo "\nBoard game updated successfully!";
}
else 
{
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
echo "<br><a href='boardgame_rud.php'>Back</a>";
?>