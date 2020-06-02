<?php
session_start();
include('header.php');
$admin = "admin@algo.com";
if ($_SESSION['superhero'] == $admin) {

?>

<div class ="Container">
	<div class="row justify-content-center">
		<div class="col-md-6 mt-4">
			<h3>Admin Edit Goal <?php echo $_SESSION['superhero'];?></h3>
			<hr>
      <?php
        $token = $_GET['token'];
        include('includes/dbconfig.php');
        $ref = "goals/";
        $getdata = $database->getReference($ref)->getChild($token)->getValue();
      ?>
		<form action="code.php" method="POST">
      <input type="hidden" name="token" value="<?php echo $token; ?>" ></input>
      <div class="form-group">
				<input type="text" name="goalname" class="form-control" value="<?php echo $getdata['goalname']?>" placeholder="Enter Goal name">

			</div>
      <div class="form-group">
				<input type="text" name="area" class="form-control" value="<?php echo $getdata['area']?>" placeholder="Enter area">

			</div>
      <div class="form-group">
				<input type="text" name="todo" class="form-control" value="<?php echo $getdata['todo']?>" placeholder="Enter to-do">

			</div>
      <div class="form-group">
				<input type="date" name="date" class="form-control" value="<?php echo $getdata['date']?>" placeholder="Enter date">

			</div>
      <div class="form-group">
				<input type="text" name="done" class="form-control" value="<?php echo $getdata['done']?>" placeholder="Done?">

			</div>

			<div class="form-group">
				<input type="text" name="username" class="form-control" value="<?php echo $getdata['username']?>" placeholder="Enter Username">

			</div>
			<div class="form-group">
				<input type="text" name="email" class="form-control" value="<?php echo $getdata['email']?>" placeholder="Enter Email">

			</div>
			<div class="form-group">
				<input type="password" name="pwd" class="form-control" value="<?php echo $getdata['pwd']?>" placeholder="Enter Password">

			</div>
			<div class="form-group">
				<button type="submit" name="update_data" class="btn btn-primary btn-block">Update Goal</button>
        <hr>
        <a href="index.php" class="btn btn-danger btn-block">Cancel</a>
			</div>
		</form>
		</div>

	</div>

</div>
<?php
}
else {

 ?>

 <div class ="Container">
 	<div class="row justify-content-center">
 		<div class="col-md-6 mt-4">
 			<h3>Edit Goal <?php echo $_SESSION['superhero'];?></h3>
 			<hr>
       <?php
         $token = $_GET['token'];
         include('includes/dbconfig.php');
         $ref = "goals/";
         $getdata = $database->getReference($ref)->getChild($token)->getValue();
       ?>
 		<form action="code.php" method="POST">
       <input type="hidden" name="token" value="<?php echo $token; ?>" ></input>
       <div class="form-group">
 				<input type="text" name="goalname" class="form-control" value="<?php echo $getdata['goalname']?>" placeholder="Enter Goal name">

 			</div>
       <div class="form-group">
 				<input type="text" name="area" class="form-control" value="<?php echo $getdata['area']?>" placeholder="Enter area">

 			</div>
       <div class="form-group">
 				<input type="text" name="todo" class="form-control" value="<?php echo $getdata['todo']?>" placeholder="Enter to-do">

 			</div>
       <div class="form-group">
 				<input type="date" name="date" class="form-control" value="<?php echo $getdata['date']?>" placeholder="Enter date">

 			</div>
       <div class="form-group">
 				<input type="text" name="done" class="form-control" value="<?php echo $getdata['done']?>" placeholder="Done?">

 			</div>

 			<div class="form-group">
 				<input type="hidden" name="username" class="form-control" value="<?php echo $getdata['username']?>" placeholder="Enter Username">

 			</div>
 			<div class="form-group">
 				<input type="hidden" name="email" class="form-control" value="<?php echo $getdata['email']?>" placeholder="Enter Email">

 			</div>
 			<div class="form-group">
 				<input type="hidden" name="pwd" class="form-control" value="<?php echo $getdata['pwd']?>" placeholder="Enter Password">

 			</div>
 			<div class="form-group">
 				<button type="submit" name="update_data" class="btn btn-primary btn-block">Update Goal</button>
         <hr>
         <a href="index.php" class="btn btn-danger btn-block">Cancel</a>
 			</div>
 		</form>
 		</div>

 	</div>

 </div>

<?php
}
 ?>

<?php include('footer.php'); ?>
