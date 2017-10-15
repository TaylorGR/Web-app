<?php
    $gameid = $_POST['gameid'];
    $score = $_POST['MemberScore'];
    $memberid = $_POST['MemberID'];

    $mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
    if ($mysqli->connect_errno)
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        die();
    }
$sql = "UPDATE Player_Score SET gameid = '$gameide', score = '$score', memberid = '$memberid'
WHERE gameid = '$gameid' AND memberid = '$memberid'";

if ($mysqli->query($sql) === TRUE)
{
    echo "\nScore updated successfully!";
}
else 
{
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
echo "<br><a href='score_rud.php'>Back</a>";
?>