<?php
require_once 'connect.php';

$id = $_REQUEST['id'];

$sql = "UPDATE goals SET goal_complete = '1' WHERE goal_id = '" . $id . "'";
if(mysqli_query($link, $sql)){
  print("Stored");
} else{
  print("Failed");
}

header("location:index.php"); 


 ?>
