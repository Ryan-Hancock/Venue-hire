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
date_default_timezone_set('GTM');
$year = date('Y-m-d H:i:s',strtotime('-3 years'));
if ($_SESSION["admin"] == 0)
{
	echo "You're not logged in. Go away!";
}
else
{
	$conn = new PDO 
	("mysql:host=localhost;dbname=rhancock;", "rhancock", "eleichah");
	$results = $conn->query("SELECT * FROM reviews WHERE approved = 0 AND reviewdate > '$year' ORDER BY reviewdate DESC");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	
		} 	

		$id = htmlentities($_GET['reveiwID']);
		
		if(isset($_GET['approve']))
		{
			$id = htmlentities($_GET['reviewID']);
			echo "$id";
			$results = $conn->prepare("UPDATE reviews SET approved = approved +1 WHERE ID = ?");	
			$results->bindParam(1,$id);
			$results->execute();
			header( "refresh:0; approval.php" );	
		
			
		}
		
		
		
			while($row=$results->fetch())
		{
			
			echo "<p>";
			echo " ID: $row[ID]  <br/> ";
			echo " venueID: $row[venueID] <br/>";
			echo " username: $row[username] <br/> ";
			echo " review: $row[review] <br/> ";
			$newDate = date('l jS \of F Y \a\t h:i:s A', strtotime($row[reviewdate]));
			echo "Review submitted on $newDate <br/> ";
			?>
            <form method="" action="">
            <input type="submit" name="approve" id="approve" value="Add review" />
            <input type="hidden" name="reviewID" value="<?php echo "$row[ID]" ?>"/>
            </form>
            <?php
			echo "</p>";
			echo "<hr>";
					
		}
		
}
?>
</body>
</html>
