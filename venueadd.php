<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$un = $_SESSION["gatekeeper"];
$a = htmlentities($_POST["venueName"]);
$b = htmlentities($_POST["venueType"]);
$c = htmlentities($_POST["venueDesc"]);

$conn = new PDO ("mysql:host=localhost;dbname=rhancock;", "rhancock", "eleichah");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = $conn->prepare("INSERT INTO venues (name, type, description, username)
VALUES (:a, :b, :c, :un)");
$sql->bindParam(':a',$a);
$sql->bindParam(':b',$b);
$sql->bindParam(':c',$c);
$sql->bindParam(':un',$un);


if ($sql->execute()) {
    echo "New record created successfully, you will be redirected";
	header ("refresh:5; url=venueadd.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
</body>
</html>
