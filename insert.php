
<?php
session_start();
include('header.php');
$getname = $_SESSION['superhero'];

if ($_SESSION['superhero'] == 'admin@algo.com') {

?>

<div class ="Container">
	<div class="row justify-content-center">
		<div class="col-md-6 mt-4">
			<h3>Admin Register Form <?php echo $_SESSION['superhero'];?></h3>
			<hr>
		<form action="code.php" method="POST">
			<div class="form-group">
				<div class="form-group">
					<input type="text" name="goalname" class="form-control" placeholder="Enter Goal Name">
				</div>
				<div class="form-group">
					<input type="text" name="area" class="form-control" placeholder="Enter Area">
				</div>
				<div class="form-group">
					<input type="text" name="todo" class="form-control" placeholder="Enter simple to-do">
				</div>
				<div class="form-group">
					<input type="date" name="date" class="form-control" placeholder="Enter date">
				</div>
				<div class="form-group">
					<input type="hidden" name="done" value="No">

				</div>
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="Enter Email">

				</div>
				<input type="text" name="username" class="form-control" placeholder="Enter Username">

			</div>

			<div class="form-group">
				<input type="hidden" name="pwd" value="Secret">

			</div>
			<div class="form-group">
				<button type="submit" name="save_push_data" class="btn btn-primary btn-block">Save Data</button>

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
			<h3>Register Form <?php echo $_SESSION['superhero'];?></h3>
			<hr>
		<form action="code.php" method="POST">
			<div class="form-group">
				<div class="form-group">
				  <input type="text" name="goalname" class="form-control" placeholder="Enter Goal Name">
				</div>
				<div class="form-group">
				  <input type="text" name="area" class="form-control" placeholder="Enter Area">
				</div>
				<div class="form-group">
				  <input type="text" name="todo" class="form-control" placeholder="Enter simple to-do">
				</div>
				<div class="form-group">
				  <input type="date" name="date" class="form-control" placeholder="Enter date">
				</div>
				<div class="form-group">
				  <input type="hidden" name="done" value="No">
				</div>
				<div class="form-group">
				  <input type="hidden" name="email" value="<?php echo $_SESSION['superhero']; ?>">

				</div>
				<input type="hidden" name="username" value="<?php echo $_SESSION['myname'] ?>">

				</div>
				<div class="form-group">
					<input type="hidden" name="pwd" value="Secret">

				</div>

			<div class="form-group">
				<button type="submit" name="save_push_data" class="btn btn-primary btn-block">Save Data</button>

			</div>
		</form>
		</div>
	</div>
</div>

<?php
}
 ?>
<?php include('footer.php'); ?>
