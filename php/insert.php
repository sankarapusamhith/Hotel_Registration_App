<?php  
$host = 'localhost:3306';  
$user = 'root';  
$pass = '';  
$dbname = 'resort';  
  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  
  
$sql = "INSERT INTO user(uname,email,password)
        VALUES ('".$_POST["username"]."','".$_POST["email"]."','".$_POST["password"]."')"; 
if(mysqli_query($conn, $sql)){  
 header("Location: login.html"); 
}else{  
echo "<script>
             alert('Could not insert record:email already exists'); 
             window.history.go(-1);
     </script>". mysqli_error($conn); 
}  


mysqli_close($conn);  
?>