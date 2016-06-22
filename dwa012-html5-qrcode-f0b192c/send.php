

<?php
 $x = $_POST['name'];
  $y = $_POST['date'];
//data

$mysql_host = "mysql6.000webhost.com";
$mysql_database = "a9529337_signin";
$mysql_user = "a9529337_signin";
$mysql_password = "signin123";





// Create connection
$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//check info

$sql = "SELECT name, lastname, studentid FROM studentinfo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
	 if ($row["studentid"] == $x){
		$z = $row["lastname"];
		$a = $row["name"];
         $sql = "INSERT INTO signin ( name, lastname, studentid, date)
			VALUES ('$a', '$z', '$x', '$y')";

			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully for $x";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$conn->close();
     }

	 }
     
} 



?>
    

