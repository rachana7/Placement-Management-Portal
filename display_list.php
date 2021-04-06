<html>
<head>
</head>

<body>


<?php

$servername = "localhost";
$username = "dbms";
$password = "123";
$dbname = "dbms_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


      $sql = "SELECT Company_ID FROM company";
      $result =$conn->query($sql);
	  if ($result) {
		  echo "<ul> ";
      while($row =  $result->fetch_assoc()){
      echo "<li>";
	  echo "$row['Company_ID']"
	  echo "</li>";
      
     
         
      }
	  echo "</ul>";
	  
   
$conn->close();


?>

</body>