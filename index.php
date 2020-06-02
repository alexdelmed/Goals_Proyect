<?php include('header.php');
session_start();
$admin = "admin@algo.com";

if ($sol = 1) {
  if(isset($_POST['passname']))
  {
  	$emailf = $_POST['emaill'];
  	$pwdf = $_POST['pwdl'];
    $_SESSION['superhero'] = $emailf;
    $sol++;
  }
}
$_SESSION['sol'] = $sol;
include('includes/dbconfig.php');
$ref = "goals/";
$fetchdata = $database->getReference($ref)->getValue();
$i = 0;
 ?>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] != "")
        {
          ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
          unset($_SESSION['status']);
        }
      ?>
    </div>
    <div class="col-md-12 mt-5">
      <div class="card">
        <div class="card-body">
          <?php
            include('includes/dbconfig.php');
            $ref = "goals/";
            $totalrowno = $database->getReference($ref)->getSnapshot()->numChildren();
            if ($_SESSION['superhero'] == $admin) {

          ?>
          <?php echo $_SESSION['superhero'];?>
          <h4>Your Goals
            <a href="#" class="btn btn-info ml-3 text-white float-right">Total No: <?php echo $totalrowno; ?></a>
            <form action="insert.php" method="POST">
              <input type="hidden" name="email_user" value="<?php echo $_SESSION['superhero'] ?>">
              <input type="hidden" name="pwd_user" value="<?php echo $pwdf; ?>">
              <button type="submit" name="passnamei" class="btn btn-primary float-right">Add</button>
            </form>
          </h4>
          <hr>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Goal Name</th>
                  <th>Area</th>
                  <th>To do</th>
                  <th>Date</th>
                  <th>Done</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php

                  if ($fetchdata > 0) {

                  foreach ($fetchdata as $key => $row)
                  {
                    $i++;

                ?>
                <tr>
                  <td><?php echo $key; ?></td>
                  <td><?php echo $row['goalname']; ?></td>
                  <td><?php echo $row['area']; ?></td>
                  <td><?php echo $row['todo']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['done']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['username']; ?></td>

                  <td>
                    <a href="edite.php?token=<?php echo $key ?>" class="btn btn-primary">Edit</a>
                  </td>
                  <td>
                    <form action="code.php" method="post">
                        <input type="hidden" name="email_user" value="<?php echo $emailf; ?>">
                        <input type="hidden" name="pwd_user" value="<?php echo $pwdf; ?>">
                        <input type="hidden" name="ref_toke_delete" value="<?php echo $key; ?>">
                        <button type="submit" name="delete_data" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                <?php
                    }
                }

                else{
                  ?>
                    <tr>
                      <td colspan="6">You Dont Have Any Work</td>
                    </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
            </div>
            <?php
            }
          else{

        ?>
        <?php echo $_SESSION['superhero'];?>
        <h4>Your Goals
          <form action="insert.php" method="POST">
            <input type="hidden" name="email_user" value="<?php echo $emailf; ?>">
            <input type="hidden" name="pwd_user" value="<?php echo $pwdf; ?>">
            <button type="submit" name="passnamei" class="btn btn-primary float-right">Add</button>
          </form>
        </h4>
        <hr>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Goal Name</th>
                <th>Area</th>
                <th>To do</th>
                <th>Date</th>
                <th>Done</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php

                if ($fetchdata > 0) {

                foreach ($fetchdata as $key => $row)
                {

                  if ($row['email'] == $_SESSION['superhero']) {
                      $_SESSION['myname'] = $row['username'];
                      $i++;
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['goalname']; ?></td>
                <td><?php echo $row['area']; ?></td>
                <td><?php echo $row['todo']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['done']; ?></td>
                <td>
                  <a href="edite.php?token=<?php echo $key ?>" class="btn btn-primary">Edit</a>
                </td>
                <td>
                  <form action="code.php" method="post">
                      <input type="hidden" name="email_user" value="<?php echo $emailf; ?>">
                      <input type="hidden" name="pwd_user" value="<?php echo $pwdf; ?>">
                      <input type="hidden" name="ref_toke_delete" value="<?php echo $key; ?>">
                      <button type="submit" name="delete_data" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              <?php
                  }
                }
              }
              else{
                ?>
                  <tr>
                    <td colspan="6">You Dont Have Any Work</td>
                  </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
          </div>
        <?php }?>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>



<?php include('footer.php'); ?>
