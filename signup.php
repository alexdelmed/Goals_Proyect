<div style="background-image: url('img/wolo.jpg');">
<?php
include('header.php');

?>

<div class ="Container">
	<div class="row justify-content-center">
		<div class="col-md-6 mt-4">
			<h3>Register Form</h3>
			<hr>
		<form action="code.php" method="POST">
			<div class="form-group">
				<div class="form-group">
					<input type="hidden" name="goalname" value="Make Goals">

				</div>
				<div class="form-group">
					<input type="hidden" name="area" value="For me">

				</div>
				<div class="form-group">
					<input type="hidden" name="todo" value="Have fun">

				</div>
				<div class="form-group">
					<input type="hidden" name="date" value="20/12/2040">

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
				<input type="password" name="pwd" class="form-control" placeholder="Enter Password">

			</div>
			<div class="form-group">
				<button type="submit" name="save_push_data" class="btn btn-primary btn-block">Save Data</button>

			</div>
		</form>
		</div>
	</div>
</div>
<div>
<a type="hidden">.</a>
</div>
<div>
<a type="hidden">.</a>
</div>
<div>
<a type="hidden">.</a>
</div>
<div>
<a type="hidden">.</a>
</div>
<div>
<a type="hidden">.</a>
</div>
<div>
<a type="hidden">.</a>
</div>
<div>
<a type="hidden">.</a>
</div>
<div>
<a type="hidden">.</a>
</div>
<div>
<a type="hidden">.</a>
</div>
<div>
<a type="hidden">.</a>
</div>

<?php include('footer.php'); ?>
