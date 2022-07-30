<?php session_start();
$connection = mysqli_connect("localhost", "root", "", "site_inspection");
?>
<?php
include('includes/header.php');
include('includes/mnavbar.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Inspector</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> first name </label>
                        <input type="text" name="fname" class="form-control" placeholder="Enter first name">
                    </div>

                    <div class="form-group">
                        <label> last name </label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter last name">
                    </div>

                    <div class="form-group">
                        <label> Username </label>
                        <input type="text" name="username" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                    </div>
                    <label>Select Gender</label>
                    <select class="form-control my-2" name="gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <label>Select Role</label>
                    <select name="role" class="form-control my-2">
                        <option value="">Selete Role</option>
                        <option value="Site_Inspector">Site_Inspector</option>
                    </select>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<h1 class="h3 mb-0 text-gray-800" style="top: 20px;left: 125px;font-weight: bold;position: absolute;">Inspectors Details</h1>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                Add Inspector
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <?php
                $query = "SELECT * FROM users where role = 'Site_inspector' ";
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
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['surname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['role']; ?></td>
                                    <td><?php echo $row['password']; ?></td>

                                </tr>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>