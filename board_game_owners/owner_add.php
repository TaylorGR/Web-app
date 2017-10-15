<?php
$Member = $_POST['member'];
$Game = $_POST['game'];

$mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
if ($mysqli->connect_errno) {
    echo "Failed to connect to the database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}
    $sql = "INSERT INTO Board_game_owners (MemberID, GameID)
    VALUES ('$Member', '$Game')";

if ($mysqli->query($sql) === true) {
    echo "\nMember '$Member' added as '$Game' owner ";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
echo "<br><a href='owner_rud.php'>Back</a>";
?>