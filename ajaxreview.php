<?php
session_start();
$un = $_SESSION["gatekeeper"];
$a= $_GET['venID'];
$_SESSION['vID'] = $a;
date_default_timezone_set('GTM');
$today = date('Y-m-d H:i:s');
$year = date('Y-m-d H:i:s',strtotime('-3 years'));
$conn = new PDO 
("mysql:host=localhost;dbname=rhancock;", "rhancock", "eleichah");
if (isset($_GET["venID"]) === true && empty($_GET["venID"]) === false)
{
$b= htmlentities($_GET["rev"]);

	$veID = htmlentities($_GET["venID"]);
    $sql = $conn->prepare("INSERT INTO reviews (venueID, username, review, reviewdate)
    VALUES (:veID, :username, :review, '$today')");
	$sql->bindParam(':veID',$veID);
	$sql->bindParam(':username',$un);
	$sql->bindParam(':review',$b);
	$sql->execute();
	
}
?>
