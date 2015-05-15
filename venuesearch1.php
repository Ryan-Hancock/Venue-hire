<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/venue.css">
<title>add venue</title>
</head>
<body>
<h1>Search Venue</h1>

<?php

if (isset($_GET["venueType"]))
{
$a= htmlentities($_GET["venueType"]);
echo "You entered the venue type: $a <br />";

$conn = new PDO 
 ("mysql:host=localhost;dbname=rhancock;", "rhancock", "eleichah");

$results = $conn->prepare("SELECT * FROM venues WHERE type=?");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
$results->bindParam(1,$a);
$results->execute();
?>
	<hr>

    <form method="" action="">
    Enter type
    <input name="venueType" id="venueType" /> <br/>
    <input type="submit" value="Search"/>
    </form>
    <hr>
    <?php
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

	$id = $_GET[ID];	
	}
}
else
{
	?>
	<hr>

    <form method="" action="">
    Enter type
    <input name="venueType" id="venueType" /> <br/>
    <input type="submit" value="Search"/>
    </form>
    <hr>
    <?php
}

?>
</body>
</html>
