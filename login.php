<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];

$conn = mysqli_connect("localhost", "root", "", "databaseexam");

$sql = "SELECT id, name FROM users WHERE username = '$username' AND password = '$password'";
echo $sql . "<br>";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
var_dump($row);
$id = $row["id"];
$name = $row["name"];
$_SESSION['userID'] = $id;
$_SESSION["userName"] = $name;

$result = $conn->query($sql);
	if($result->num_rows > 0) {
		header("Location: index.php");
		exit;
	} else {
		echo "<p style='color:red'>Wrong Username/Password</p>";
	}
