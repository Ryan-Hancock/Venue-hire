<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
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
$results = $conn->prepare("SELECT * FROM reviews WHERE venueID = :venueid AND reviewdate > '$year' AND approved = 1 ORDER BY reviewdate DESC");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	
	} 
$results->bindParam(':venueid',$a);
$results->execute();

	
	if(isset($_GET['submit'])) 
	{
	
    $b= htmlentities($_GET["rev"]);
	$veID = htmlentities($_GET["venID"]);
    $sql = $conn->prepare("INSERT INTO reviews (venueID, username, review, reviewdate)
    VALUES (:veID, :username, :review, '$today')");
	$sql->bindParam(':veID',$veID);
	$sql->bindParam(':username',$un);
	$sql->bindParam(':review',$b);
	//$sql->execute();
	
		if ($sql->execute()) {
			 $disabled="disabled=true"; 
			 header( "refresh:2; url=http://edward2.solent.ac.uk/~rhancock/review.php?venID=$a" );	
			 echo "New record created successfully, Refreshing";
			 
		} 
		else 
		{
    	echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
			
		
	}
	else
	{
	$disabled="";	
		
	
	}
?>
        <form method="" action="">
		Enter review
    	<input name="rev" type="text" /> <br/>
        <input type="hidden" name="venID" value="<?php echo "$a" ?>"/>
    	<input type="submit" name="submit" value="Add review" <?php echo "$disabled" ?>"/>
    	</form>
        <?php			
		
		while($row=$results->fetch())
		{
			
			echo "<p>";
			echo " ID: $row[ID]  <br/> ";
			echo " venueID: $row[venueID] <br/>";
			echo " username: $row[username] <br/> ";
			echo " review: $row[review] <br/> ";
			$newDate = date('l jS \of F Y \a\t h:i:s A', strtotime($row[reviewdate]));
			echo "Review submitted on $newDate <br/> ";
			echo "</p>";
			echo "<hr>";
					
		}
	



?>

<body>
</body>
</html>
