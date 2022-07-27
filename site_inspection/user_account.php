<?php

include("include/connection.php");

$output = "";

if (isset($_POST['save'])) {
    $fname = str_replace("'", "\'", $_POST["fname"]);
    $sname =      str_replace("'", "\'", $_POST['sname']);
    $uname =      str_replace("'", "\'", $_POST['uname']);
    $email =     str_replace("'", "\'", $_POST['email']);
    $gender =     str_replace("'", "\'", $_POST['gender']);
    $role =         str_replace("'", "\'", $_POST['role']);
    $pass =     str_replace("'", "\'", $_POST['pass']);
    $c_pass =     str_replace("'", "\'", $_POST['c_pass']);

    $error = array();

    if (empty($fname)) {
        $error['error'] = "Firstname is Empty";
    } else if (empty($sname)) {
        $error['error'] = "Surname is empty";
    } else if (empty($uname)) {
        $error['error'] = "username is empty";
    } else if (empty($email)) {
        $error['error'] = "email is empty";
    } else if (empty($gender)) {
        $error['error'] = "Select Gender";
    } else if (empty($role)) {
        $error['error'] = "Select role";
    } else if (empty($pass)) {
        $error['error'] = "Enter Password";
    } else if (empty($c_pass)) {
        $error['error'] = "Confirm Password";
    } else if ($pass != $c_pass) {
        $error['error'] = "Both password do not match";
    }



    if (isset($error['error'])) {
        $output .= $error['error'];
    } else {
        $output .= "";
    }


    if (count($error) < 1) {

        $query = "INSERT INTO users(firstname,surname,username,gender,role,password,email) VALUES('$fname','$sname','$uname','$gender','$role','$pass','$email')";
        $res = mysqli_query($connect, $query);

        if ($res) {
            $output .= "You have successfully registered";
            header("Location:index.php");
        } else {
            $output .= "Failed to register";
        }
    }
}



?>

<html>

<head>
    <meta charset="utf-8">
    <title>Site_Inspection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<body style="background-color:pink; color:black">
    </head>

    <body>
<?php
include('includes/header.php');
include('includes/nav/uanavbar.php');
?>
        <div class="container">
            <div class="col-md-12">
                <div class="row d-flex">
                    <div class="col-md-6 shadow-sm">
                        <form method="post">

                            <div class="text-center"><?php echo $output; ?></div>
                            <div style="display: flex;gap: 15px;align-items: center;">
                                <label>Firstname</label>
                                <input type="text" name="fname" class="form-control my-2" placeholder="Enter Firstname" autocomplete="off">
                            </div>
                            <div style="display: flex;gap: 20px;align-items: center;">

                                <label>Surname</label>
                                <input type="text" name="sname" class="form-control my-2" placeholder="Enter Surname" autocomplete="off">
                            </div>

                            <div style="display: flex;gap: 10px;align-items: center;">

                                <label>Username</label>
                                <input type="text" name="uname" class="form-control my-2" placeholder="Enter your username" autocomplete="off">
                            </div>
                            <div style="display: flex;gap: 41px;align-items: center;">

                                <label>Email</label>
                                <input type="email" name="email" class="form-control my-2" placeholder="Enter your email" autocomplete="off">
                            </div>
                            <div style="display: flex;gap: 7px;align-items: center;">

                                <label style="width: 150px;">Select Gender</label>
                                <select class="form-control my-2" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div style="display: flex;gap: 10px;align-items: center;">

                                <label style="width: 150px;">Old Password</label>
                                <input type="old-password" name="pass" class="form-control my-2" placeholder="Enter Old Password">
                            </div>
                            <div style="display: flex;gap: 7px;align-items: center;">
                                <label style="width: 150px;">New Password</label>
                                <input type="new-password" name="c_pass" class="form-control my-2" placeholder="Enter New Password">
                            </div>
                            <div style="display: flex;gap: 15px;align-items: center;">
                                <input type="submit" name="save" class="btn btn-success" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
include('includes/scripts.php');
include('includes/footer.php');
?>
    </body>

</html>