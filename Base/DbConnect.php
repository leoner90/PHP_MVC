<?php 
// DB connection
class Base_DbConnect {
	public function dbConnect(){
		$servername = "localhost";
		$username = "l47945_leoner";
		$serverpassword = "samsung1234";
		$dbname = "l47945_scandiweb";
		$connection = new mysqli($servername , $username , $serverpassword , $dbname);
		if ($connection->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}	else {
			return $connection;
		}
	}
}
?>