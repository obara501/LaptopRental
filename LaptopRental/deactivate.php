<?php
require_once("includes/config.php");
// code user email availablity
if (!empty($_POST["id"])) {

    $statid = intval($_GET['id']);
    $sql = "UPDATE tbllaptops SET Status=2 WHERE tblaptop.id=:statid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':statid', $statid, PDO::PARAM_STR);
    $query->execute();
    $message = "Status changed to Inactive";
    header('location: my-laptops.php');
}