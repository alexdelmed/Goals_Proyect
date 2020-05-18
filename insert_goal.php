<?php
require_once 'connect.php';

$category = $_REQUEST['cat'];
$text = $_REQUEST['text'];
$date = $_REQUEST['goaldate'];
$complete = $_REQUEST['complete'];

if ($complete == '' || $complete == null){
  $complete = 0;
}

$sql = "INSERT INTO goals (goal_category, goal_text, goal_date, goal_complete) VALUES
	(
	'$category',
	'$text',
	'$date',
	$complete
	)";

//print $sql;
IF(mysqli_query($link, $sql)){
  print("Stored");
} else {
  print("Failed");
}

header("location:index.php");
?>
