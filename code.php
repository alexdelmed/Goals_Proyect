<?php
session_start();
include('includes/dbconfig.php');

if(isset($_POST['save_push_data']))
{
	$goalname = $_POST['goalname'];
	$area = $_POST['area'];
	$todo = $_POST['todo'];
	$date = $_POST['date'];
	$done = $_POST['done'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];

	$data = [
		'goalname' => $goalname,
		'area' => $area,
		'todo' => $todo,
		'date' => $date,
		'done' => $done,
		'email' => $email,
		'username' => $username,
		'pwd' => $pwd
	];

	$ref = "goals/";
	$postdata = $database->getReference($ref)->push($data);

	if($postdata)
    {
		$_SESSION['status'] = "Data inserted succes";
		header("Location: index.php");
	}else{
		$_SESSION['status'] = "Data inserted fail";
		header("Location: index.php");
	}
}

if(isset($_POST['update_data']))
{
	$goalname = $_POST['goalname'];
	$area = $_POST['area'];
	$todo = $_POST['todo'];
	$date = $_POST['date'];
	$done = $_POST['done'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	$token = $_POST['token'];

	$data = [
		'goalname' => $goalname,
		'area' => $area,
		'todo' => $todo,
		'date' => $date,
		'done' => $done,
		'email' => $email,
		'username' => $username,
		'pwd' => $pwd
	];

	$ref = "goals/".$token;
	$postdata = $database->getReference($ref)->update($data);

	if($postdata)
    {
		$_SESSION['status'] = "Goal updated succes";
		header("Location: index.php");
	}else{
		$_SESSION['status'] = "Goal updated fail";
		header("Location: index.php");
	}
}


if (isset($_POST['delete_data'])) {
	$token = $_POST['ref_toke_delete'];
	$ref = "goals/".$token;
	$deleteData = $database->getReference($ref)->remove();

	if($deleteData)
    {
		$_SESSION['status'] = "Goal deleted succes";
		header("Location: index.php");
	}else{
		$_SESSION['status'] = "Goal deleted fail";
		header("Location: index.php");
	}
}

function pasar($emailf, $pwdf){

}

?>
