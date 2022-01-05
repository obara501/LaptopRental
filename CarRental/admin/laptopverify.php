
<?php
//  code laptop availablity
require_once("includes/config.php");
if (!empty($_POST["serialnumber"])) {
	$serialnumber = $_POST["serialnumber"];
	$sql = "SELECT SerialNumber FROM tblvehicles WHERE SerialNumber=:serialnumber";
	$query = $dbh->prepare($sql);
	$query->bindParam(':serialnumber', $serialnumber, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	echo($query->rowCount());
	if ($query->rowCount() > 0) {
		echo "<span style='color:red'> Laptop Already Exists .</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else {
		echo "<span style='color:green'> Laptop is viable for Registration .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
?>