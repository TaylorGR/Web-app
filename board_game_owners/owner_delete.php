<?php
$game = $_POST['game'];
$member = $_POST['member'];
echo "<h1>Deleting record of ownership '$member', '$game'</h1>";

$mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
if ($mysqli->connect_errno)
{
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}

$sql = "DELETE FROM board_game_owners WHERE gameid='" . $game . "' AND memberid= '" .$member ."'";

if ($mysqli->query($sql) === TRUE)
{
echo "Record of ownership removed successfully ";
}
else 
{
echo "Error: " . $sql . "<br>" . $mysqli->error;
}
echo "<br><a href='owner_rud.php'>Back</a>";
?>