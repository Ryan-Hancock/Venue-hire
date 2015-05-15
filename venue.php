<?php
$conn = new PDO 
	("mysql:host=localhost;dbname=rhancock;", "rhancock", "eleichah");
if (isset($_POST["type"]) === true && empty($_POST["type"]) === false) {
	$a = htmlentities($_POST["type"]);
	$results = $conn->prepare("SELECT * FROM venues WHERE type=:type");
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	$results->bindParam(':type',$a);
	$results->execute();
	
	while($row=$results->fetch())
  
	{
	
    echo "<p>";
    echo " ID: $row[ID]  <br/> ";
    echo " name: $row[name] <br/> " ; 
    echo " type: $row[type] <br/>" ; 
    echo " description: $row[description] <br/>" ; 
	echo " recommendations: $row[recommended] <br/>" ;
    echo "</p>";
	echo "<a href='rec.php?ID=$row[ID]'>recommend</a> / <a href='review.php?venID=$row[ID]'>Review</a> ";
	echo "<button type='button' id='review-button' onClick='functionOne($row[ID]);'>review</button>";
	echo "<div id='cal$row[ID]'></div>";
	
	}
}
?> 
