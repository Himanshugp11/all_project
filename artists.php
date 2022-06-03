<?php
	$arname = addslashes($_POST['arname']);
	$dateofbirth= addslashes($_POST['dateofbirth']);
	$bio= addslashes($_POST['bio']);
	

	// Database connection
	$conn = new mysqli('localhost','root','root','deltax');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	else {
		$stmt = $conn->prepare("insert into artists_table(artist_name, artist_dob, arist_bio) values(?, ?, ?)");
		$stmt->bind_param("sss", $arname, $dateofbirth, $bio);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

?>

<!-- 
$host = "localhost";
$username = "root";
$password = "root";

try 
{
    $conn = new PDO("mysql:host=$host;dbname=deltax", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

// FORM SUBMITTED DATA CAN ACCESSED BY:
// 1. $_REQUEST : CAN BE USED FOR BOTH get AND post METHOD
// 2. $_POST : CAN BE USED ONLY FOR post METHOD
// 3. $_GET : CAN BE USED ONLY FOR get METHOD

if(isset($_POST['save_contact']))
{
	//print_r($_POST);
	$sql = "INSERT INTO artists_table(artist_name, artist_dob, arist_bio) VALUES('".addslashes($_POST['arname'])."', '".addslashes($_POST['dateofbirth'])."', '".addslashes($_POST['bio'])."')";
	$conn->query($sql);
} -->
