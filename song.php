<?php
	$sname = addslashes($_POST['sname']);
	$datereleased= addslashes($_POST['datereleased']);
	$imgart= addslashes($_POST['imgart']);
    $artistsname= $_POST['artistsname'];
	

	// Database connection
	$conn = new mysqli('localhost','root','root','deltax');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	else {
		$stmt = $conn->prepare("insert into song(song_name, date_of_released, artwork_img, artists_search) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $sname, $datereleased, $imgart, $artistsname);
		$execval = $stmt->execute();
		// echo $execval;
		// echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

?>