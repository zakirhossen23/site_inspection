<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manager Page</title>
</head>
<body>

	<?php
  $connection=mysqli_connect("localhost","root","","site_inspection");
    include('includes/header.php');
    include('includes/mnavbar.php');
    include("include/connection.php");
    ?>

<div class="card-body">
            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM users";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                              <th> ID </th>
                              <th>First name</th>
                              <th> Last name </th>
                              <th>Username </th>
                               <th>Email </th>
                               <th>Gender </th>
                               <th>Role </th>
                               <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['firstname']; ?></td>
                                <td><?php  echo $row['surname']; ?></td>
                                <td><?php  echo $row['username']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['gender']; ?></td>
                                <td><?php  echo $row['role']; ?></td>
                                <td><?php  echo $row['password']; ?></td>
                               
                            </tr>
                        <?php
                            }
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>

</body>
</html>