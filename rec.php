        
<?php
$a= htmlentities($_GET["ID"]);
  
$conn = new PDO 
 ("mysql:host=localhost;dbname=rhancock;", "rhancock", "eleichah");

$results = $conn->prepare("UPDATE venues SET recommended = recommended +1 WHERE ID = :venueid");
$results->bindParam(':venueid',$a);
$results->execute();
$results = $conn->prepare("SELECT * FROM venues WHERE ID= :venueid");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$results->bindParam(':venueid',$a);
$results->execute();
$row=$results->fetch();
 
	echo "You Recommended";
    echo "<p>";
    echo " ID: $row[ID]  <br/> ";
    echo " Venue: $row[name] <br/> " ; 
    echo " Venue Type: $row[type] <br/>" ; 
    echo " Description: $row[description] <br/>" ; 
    echo "</p>";
	echo "you will be redirected";
	header( "refresh:4; venuesearch1.php?venueType=$row[type]" );	
?>
