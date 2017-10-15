<?php
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
if ($mysqli->connect_errno) {
    echo "Failed to connect to the database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}
    $sql = "INSERT INTO players (fName, lName, email, phone)
    VALUES ('$fName', '$lName', '$email', '$phone')";

if ($mysqli->query($sql) === true) {
    echo "\nNew record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
echo "<br><a href='boardgame_form.html'>Back</a>";
?>