<?php
include("include/connection.php");

$output = "";

if (isset($_POST['register'])) {
	$fname = str_replace("'","\'",$_POST["fname"]);
	$sname =  	str_replace("'","\'",$_POST['sname']);
	$uname =  	str_replace("'","\'",$_POST['uname']);
	$email = 	str_replace("'","\'",$_POST['email']);
	$gender = 	str_replace("'","\'",$_POST['gender']);
	$role =	 	str_replace("'","\'",$_POST['role']);
	$pass = 	str_replace("'","\'",$_POST['pass']);
	$c_pass = 	str_replace("'","\'",$_POST['c_pass']);

	$error = array();

	if (empty($fname)) {
		$error['error'] = "Firstname is Empty";
	}else if(empty($sname)){
		$error['error'] = "Surname is empty";
	}else if(empty($uname)){
		$error['error'] = "username is empty";
	}else if(empty($email)){
		$error['error'] = "email is empty";
	}else if(empty($gender)){
		$error['error'] = "Select Gender";
	}else if(empty($role)){
		$error['error'] = "Select role";
    }else if(empty($pass)){
		$error['error'] = "Enter Password";
	}else if(empty($c_pass)){
		$error['error'] = "Confirm Password";
	}else if($pass != $c_pass){
		$error['error'] = "Both password do not match";
	}



	if (isset($error['error'])) {
		$output .= $error['error'];
	}else{
		$output .= "";
	}


	if (count($error) < 1) {

		$query = "INSERT INTO users(firstname,surname,username,gender,role,password,email) VALUES('$fname','$sname','$uname','$gender','$role','$pass','$email')";
		$res = mysqli_query($connect,$query);

		if ($res) {
			$output .= "You have successfully registered";
			header("Location:index.php");
		}else{
			$output .= "Failed to register";
		}
	}
}



 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Site_Inspection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<body >
    </head>

    <body style="background-color:#EDF1F5;">

        <?php include("include/header.php"); ?>


        <div class="container">
            <div class="col-md-12" >
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 shadow-sm" style="margin-top:50px;background: white;color: black;border-radius: 10px;" >
                        <form method="post">
                            <h3 class="text-center my-3">Register</h3>

                            <div class="text-center"><?php echo $output; ?></div>

                            <label>Firstname</label>
                            <input type="text" name="fname" class="form-control my-2" placeholder="Enter Firstname"
                                autocomplete="off">

                            <label>Surname</label>
                            <input type="text" name="sname" class="form-control my-2" placeholder="Enter Surname"
                                autocomplete="off">


                            <label>Username</label>
                            <input type="text" name="uname" class="form-control my-2" placeholder="Enter your username"
                                autocomplete="off">

                            <label>Email</label>
                            <input type="email" name="email" class="form-control my-2" placeholder="Enter your email"
                                autocomplete="off">


                            <label>Select Gender</label>
                            <select class="form-control my-2" name="gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                            <label>Select Role</label>
                            <select name="role" class="form-control my-2">
                                <option value="">Selete Role</option>
                                <option value="Site_inspector">Site_inspector</option>
                            </select>

                            <label>Password</label>
                            <input type="password" name="pass" class="form-control my-2" placeholder="Enter Password">

                            <label>Confirm Password</label>
                            <input type="password" name="c_pass" class="form-control my-2"
                                placeholder="Enter Confirm Password">

                            <input type="submit" name="register" class="btn btn-success" value="Register" style="width: 100%;margin-bottom: 17px;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="" style="margin-top: 30px;"></div>

    </body>

</html>