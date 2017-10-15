<?php
    $memberid = $_POST['memberid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
    if ($mysqli->connect_errno)
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        die();
    }
$sql = "UPDATE Players SET FName = '$fname', LName = '$lname', Email = '$email', Phone = '$phone'
WHERE MemberID = '$memberid'";

if ($mysqli->query($sql) === TRUE)
{
    echo "\nMember record updated successfully!";
}
else 
{
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>