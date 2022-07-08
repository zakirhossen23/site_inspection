<?php
session_start();
include("include/connection.php");


$output = "";

if (isset($_SESSION['manager'])) {
    header("Location: manager.php");
}else if(isset($_SESSION['admin'])){
    header("Location: admin.php");
}else if(isset($_SESSION['user'])){
    header("Location: user.php");
}else if(isset($_SESSION['site_inspector'])){
    $_SESSION['site_inspector'] = $uname;
    header("Location: site_inspector.php");
}


if (isset($_POST['login'])) {
    $uname = str_replace("'", "\'", $_POST['uname']);
    $role =   $_POST['role'];
    $pass =     str_replace("'", "\'", $_POST['pass']);
    if (empty($uname)) {
        $error['error'] = "username required";
    } else if (empty($role)) {
        $error['error'] = "role required";
    } else if (empty($pass)) {
        $error['error'] = "password required";
    } else {

        $query = "SELECT * FROM users WHERE username='$uname' AND role='$role' AND password='$pass'";
        $res = mysqli_query($connect, $query);

        if (mysqli_num_rows($res) == 1) {

            if ($role == "Manager") {

                $_SESSION['manager'] = $uname;
                header("Location: manager.php");
            } else if ($role == "Admin") {

                $_SESSION['admin'] = $uname;
                header("Location: admin.php");
            } else if ($role == "user") {

                $_SESSION['user'] = $uname;
                header("Location: user.php");
            } else if ($role == "Site_inspector") {

                $_SESSION['site_inspector'] = $uname;
                header("Location: site_inspector.php");
            }

            $output .= "you have logged-In";
        } else {
            $output .= "Incorrect Username or Password";
        }
    }
    if (isset($error['error'])) {
		$output .= $error['error'];
	}else{
		$output .= "";
	}
}




?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Site Inspection System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<body style="background-color:grey; color:white">
    </head>

    <body>
        <?php include("include/header.php"); ?>



        <div class="container">
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 shadow-sm" style="margin-top:100px;">
                        <form method="post">
                            <h3 class="text-center my-3">Login</h3>
                            <div class="text-center"><?php echo $output; ?></div>
                            <l6abel>Username</label>
                                <input type="text" name="uname" class="form-control my-2" placeholder="Enter Username" autocomplete="off">

                                <label>Select Role</label>
                                <select name="role" class="form-control my-2">
                                    <option value="">Selete Role</option>
                                    <option value="Site_inspector">Site_inspector</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Admin">Admin</option>
                                    <option value="user">user</option>
                                </select>

                                <label>Password</label>
                                <input type="password" name="pass" class="form-control my-2" placeholder="Enter Password">

                                <input type="submit" name="login" class="btn btn-success" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>