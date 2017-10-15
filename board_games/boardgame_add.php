<?php
$Name = $_POST['Name'];
$Position = $_POST['Position'];
$Notes = $_POST['Notes'];

$mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
if ($mysqli->connect_errno) {
    echo "Failed to connect to the database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}
    $sql = "INSERT INTO Board_games (Boardgame, Position, Notes)
    VALUES ('$Name', '$Position', '$Notes')";

if ($mysqli->query($sql) === true) {
    echo "\nNew board game added successfully ";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
echo "<br><a href='boardgame_form.html'>Back</a>";
?>