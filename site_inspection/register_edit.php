<?php
$connection=mysqli_connect("localhost","root","","site_inspection");
?>

<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT User Profile </h6>
        </div>
        <div class="card-body">
        <?php

            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM users WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="code.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                             <div class="form-group">
                                <label> Firstname </label>
                                <input type="text" name="edit_firstname" value="<?php echo $row['firstname'] ?>" class="form-control"
                                    placeholder="Enter firstname">
                             <div class="form-group">
                                <label> Surname </label>
                                <input type="text" name="edit_surname" value="<?php echo $row['surname'] ?>" class="form-control"
                                    placeholder="Enter surname">
                            <div class="form-group">
                                <label> Username </label>
                                <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control"
                                    placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control"
                                    placeholder="Enter Email">
                            <div class="form-group">
                                <label> Gender </label>
                                <input type="text" name="edit_gender" value="<?php echo $row['gender'] ?>" class="form-control"
                                    placeholder="Enter Gender">
                            <div class="form-group">
                                <label> Role </label>
                                <input type="text" name="edit_role" value="<?php echo $row['role'] ?>" class="form-control"
                                    placeholder="Enter role">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="edit_password" value="<?php echo $row['password'] ?>"
                                    class="form-control" placeholder="Enter Password">
                            </div>

                            <a href="admin_register.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

                        </form>
                        <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>