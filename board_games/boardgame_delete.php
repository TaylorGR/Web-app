<?php
$game = $_POST['todelete'];
echo "<h1>Deleting Board game " . $game . "</h1>";

$mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
if ($mysqli->connect_errno)
{
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}

$sql = "DELETE FROM board_games WHERE gameid='" . $game . "'";

if ($mysqli->query($sql) === TRUE)
{
echo "Board game removed successfully ";
}
else 
{
echo "Error: " . $sql . "<br>" . $mysqli->error;
}
echo "<br><a href='boardgame_rud.php'>Back</a>";
?>