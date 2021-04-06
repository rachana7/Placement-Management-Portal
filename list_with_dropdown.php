<html>
<body>

<?php
$sql = "SELECT date FROM date_fixtures where Company_ID=mine";
      $result =$conn->query($sql);
	  if ($result) {
		  echo '<select id="cardtype" name="cards"><option value="selectcard" selected="selected">--- Please select ---</option>';
		  while($row =  $result->fetch_assoc()){
echo '<option value="mastercard" >';
echo $row['date'];
echo'</option>'; }
echo "</select>";
	  }
?>
</body>
</html>