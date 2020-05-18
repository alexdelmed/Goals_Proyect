<?php
require_once 'connect.php';

$id = $_REQUEST['id'];

$sql = "DELETE FROM goals WHERE goal_if = '" . $id . "'";
if(mysqli_query($link, $sql)){
  print ("Stored");
} else {
  print ("Failed");
}

header("location:index.php"); 

 ?>
