<?php
session_start();

$un = htmlentities($_POST["username"]);
$pw = htmlentities($_POST["password"]);
$conn = new PDO("mysql:host=localhost;dbname=rhancock;",
                "rhancock","eleichah");
				
$results = $conn->prepare("SELECT * FROM users WHERE username= :un AND password= :pw");
$results->bindParam(':un',$un);
$results->bindParam(':pw',$pw);
$results->execute();
$row=$results->fetch();



if ($pw = "$row[password]" and $un = "$row[username]") 
{
	 // Correct password : set up the authentication session variable
    // and store the username in it
    $_SESSION["gatekeeper"] = $un;
	if ("$row[isadmin]" == 1)
	{
		$_SESSION["admin"] = 1;	
	}

    // Redirect to the main menu
    header ("Location: menu.html");
}
else
{
   // The wrong password was supplied!
    echo "Incorrect password!";
}
?>
