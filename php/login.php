<?php
$uemail=$_POST["email"];
$upass=$_POST["password"];
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "resort";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT password FROM user where email='".$_POST["email"]."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$pass=$row["password"];
        echo "password: " . $row["password"]. " <br>";
		echo"pass:$pass";
    }
} else {
    echo "<script>
             alert('Could not login:email doesn't exist'); 
             window.history.go(-1);
     </script>". mysqli_error($conn); 
}

if($pass==$upass)
{
	header("Location: home1.html"); 
}
else{  
echo "<script>
             alert('Could not login:wrong password'); 
             window.history.go(-1);
     </script>". mysqli_error($conn); 
}  

$conn->close();
?>