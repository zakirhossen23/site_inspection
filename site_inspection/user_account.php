<?php session_start(); ?>

<?php

include("include/connection.php");


$userid = $_SESSION["userid"];
$user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE id = $userid"));

$output = "";

if (isset($_POST['save'])) {
    $fname = str_replace("'", "\'", $_POST["fname"]);
    $sname =      str_replace("'", "\'", $_POST['sname']);
    $uname =      str_replace("'", "\'", $_POST['uname']);
    $gender =     str_replace("'", "\'", $_POST['gender']);
    $Old_pass =     str_replace("'", "\'", $_POST['old-password']);
    $New_pass =     str_replace("'", "\'", $_POST['new-password']);

    $error = array();

    $saving_pass = str_replace("'", "\'", $user["password"]);

    $changingPass = 0;
    if (empty($Old_pass) && empty($New_pass)) {
        $changingPass = 0;
    } else {
        $changingPass = 1;
    }
    if ($user["password"] != $Old_pass && $changingPass == 1) {
        $error['error'] = "Given Old Password is not correct!";
    } else if (empty($New_pass) && "" !== $Old_pass) {
        $error['error'] = "New Password cannot be empty";
    } else if (empty($Old_pass) && "" !== $New_pass) {
        $error['error'] = "Old password cannot be empty";
    } else  if (in_array(explode('.', $_FILES["image"]["name"])[1], ['jpg', 'jpeg', 'png']) == false && isset($_FILES["image"]["name"])) {
        $error['error'] = "Invalid Image Extension";
    } elseif ($_FILES["image"]["size"] > 1200000 && isset($_FILES["image"]["name"])) {
        $error['error'] = "Image Size Is Too Large";
    } else {
        if ($changingPass == 1)
        $saving_pass =   $New_pass;
    }

    if (isset($error['error'])) {
        $output .= $error['error'];
    } else {
        $output .= "";
    }


    if (count($error) < 1) {

        if (isset($_FILES["image"]["name"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];

            $imageName = $_FILES["image"]["name"];
            $imageSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            // Image validation
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));
            $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
            $newImageName .= '.' . $imageExtension;
            $query = "UPDATE users SET image = '$newImageName' WHERE id = $id";
            mysqli_query($connect, $query);
            move_uploaded_file($tmpName, 'UploadedImages/' . $newImageName);
        }

        $query = "UPDATE users SET firstname = '$fname',surname = '$sname',username= '$uname',gender = '$gender',password = '$saving_pass' WHERE id = $id";
        $res = mysqli_query($connect, $query);

        if ($res) {
            $output .= "Successfully Updated Account!";
            header("Location:user_account.php");
        } else {
            $output .= "Failed to Update";
        }
    }
}



?>

<html>

<head>
    <meta charset="utf-8">
    <title>Site_Inspection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/user-acc.css" rel="stylesheet">

<body style="background-color:pink; color:black">
    </head>

    <body>
        <?php
        include('includes/header.php');
        include('includes/navbar.php');
        ?>
        <div class="container">
            <div class="col-md-12">
                <div class="row d-flex">
                    <div class="col-md-6 shadow-sm">
                        <div class="text-center"><?php echo $output; ?></div>
                        <form method="post"  enctype="multipart/form-data">
                            <div class="upload">
                                <?php
                                $id = $user["id"];
                                $name = $user["username"];
                                $image = $user["image"];
                                ?>
                                <img src="UploadedImages/<?php echo $image; ?>" id="preview" width=125 height=125 title="<?php echo $image; ?>">
                                <div class="round">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                                    <i class="fa fa-camera" style="color: #fff;"></i>
                                </div>
                            </div>
                            
                            <div style="display: flex;gap: 15px;align-items: center;">
                                <label>Firstname</label>
                                <input type="text" name="fname" value="<?php echo $user["firstname"] ?>" class="form-control my-2" placeholder="Enter Firstname" autocomplete="off">
                            </div>
                            <div style="display: flex;gap: 20px;align-items: center;">
                                <label>Surname</label>
                                <input type="text" name="sname" class="form-control my-2" value="<?php echo $user["surname"] ?>" placeholder="Enter Surname" autocomplete="off">
                            </div>

                            <div style="display: flex;gap: 10px;align-items: center;">

                                <label>Username</label>
                                <input type="text" name="uname" class="form-control my-2" value="<?php echo $user["username"] ?>" placeholder="Enter your username" autocomplete="off">
                            </div>

                            <div style="display: flex;gap: 7px;align-items: center;">

                                <label style="width: 150px;">Select Gender</label>
                                <select class="form-control my-2" name="gender" >
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div style="display: flex;gap: 10px;align-items: center;">
                                <label style="width: 150px;">Old Password</label>
                                <input type="password" name="old-password" class="form-control my-2" placeholder="Leave bank if you don't want to change Password">
                            </div>
                            <div style="display: flex;gap: 7px;align-items: center;">
                                <label style="width: 150px;">New Password</label>
                                <input type="password" name="new-password" class="form-control my-2" placeholder="Leave bank if you don't want to change Password">
                            </div>
                            <div style="display: flex;gap: 15px;align-items: center;">
                                <input type="submit" name="save" class="btn btn-success" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript">
            $('[name="gender"]').val('<?php echo $user["gender"] ?>');

            function readIMG(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            document.getElementById("image").onchange = function() {
                readIMG(this);
            };
        </script>
        <?php
        include('includes/scripts.php');
        include('includes/footer.php');
        ?>
    </body>

</html>