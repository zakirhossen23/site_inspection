<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edit Site inspection</title>
    <style>
        tr td input {
            width: 300px;
        }
    </style>
</head>

<body>

    <?php
    include('includes/header.php');
    if (isset($_SESSION['manager'])) {
        include('includes/mnavbar.php');
    } else if (isset($_SESSION['site_inspector'])) {
        include('includes/snavbar.php');
    }
    include("include/connection.php");
    ?>

    <?php

    $output = "";
    $row = null;
    $id = -1;
    if (isset($_POST['submit'])) {

        $id = $_POST['edit_id'];
        $client_name = str_replace("'", "\'", $_POST["client_name"]);
        $date = str_replace("'", "\'", $_POST["date"]);
        $site_name = str_replace("'", "\'", $_POST["site_name"]);
        $address1 = str_replace("'", "\'", $_POST["address1"]);
        $address2 = str_replace("'", "\'", $_POST["address2"]);
        $post_code = str_replace("'", "\'", $_POST["post_code"]);
        $site_description = str_replace("'", "\'", $_POST["site_description"]);
        $equipment = str_replace("'", "\'", $_POST["equipment"]);
        $hour = str_replace("'", "\'", $_POST["hour"]);
        $expire = str_replace("'", "\'", $_POST["expire"]);
        $total_budget = str_replace("'", "\'", $_POST["total_budget"]);
        $inspectior_name = str_replace("'", "\'", $_POST["inspectior_name"]);
        $qoute = str_replace("'", "\'", $_POST["qoute"]);
        $error = array();

        if (empty($date)) {
            $error['error'] = "Date is Empty";
        } else if (empty($site_name)) {
            $error['error'] = "Site Name is empty";
        } else if (empty($client_name)) {
            $error['error'] = "Client Name is empty";
        }


        if (isset($error['error'])) {
            $output .= $error['error'];
        } else {
            $output .= "";
        }


        if (count($error) < 1) {

            $query = "UPDATE `inspections` SET `client_name`='$client_name',`date`='$date',`site_name`='$site_name',`address1`='$address1',`address2`='$address2',`title`='$title',`post_code`='$post_code',`site_description`='$site_description',`equipment`='$equipment',`hour`='$hour',`expire`='$expire',`total_budget`='$total_budget',`inspectior_name`='$inspectior_name',`qoute`='$qoute' WHERE `ID` = '$id'";

            $res = mysqli_query($connect, $query);

            if ($res) {

                echo '<script>
                window.location.href="site_inspector_All_Inspections.php"
                </script>';
            } else {
                $output .= "Failed to Update Form Data";
            }
        }
    } else {
    }

    if (isset($_POST['edit_btn'])) {

        $id = $_POST['edit_id'];
        $query = "SELECT * FROM `inspections` WHERE `ID` ='$id' ";
        $query_run = mysqli_query($connect, $query);

        foreach ($query_run as $fullrow) {
            $row = $fullrow;
        }
    }

    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">

        </div>
        <h1 class="h3 mb-0 text-gray-800" style="top: 20px;left: 150px;font-weight: bold;position: absolute;">Edit Site Inspection</h1>
        <!-- Content Row -->
        <div class="row">


            <!-- Content Row -->
            <?php include("include/head.php"); ?>
            <div style="margin: 0 0 0 40px;">
                <div>
                    <div class="col"></div>
                    <div>
                        <div class="text-center"><?php echo $output; ?></div>
                        <form action="" method="post" enctype="">
                            <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                    
                            <div style="display: flex; gap:20px">
                                <table style="width: 550px; column-gap:14px">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5>Client Name:</h5>
                                            </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $row['client_name'] ?>" name="client_name"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 21%;">
                                                <h5>Date: </h5>
                                            </td>
                                            <td style="width: 26%;"><input type="date" value="<?php echo $row['date'] ?>" class="form-control" name="date" /></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Site Name:</h5>
                                            </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $row['site_name'] ?>"  name="site_name"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Address line 1: </h5>
                                            </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $row['address1'] ?>" name="address1"></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5>Address line 2: </h5>
                                            </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $row['address2'] ?>" name="address2"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Post code: </h5>
                                            </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $row['post_code'] ?>" name="post_code"></td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Site Description: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <textarea class="form-control" name="site_description" rows="5"><?php echo $row['site_description'] ?></textarea>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <table style="width: 500px; column-gap:14px">
                                    <tbody>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Equipment: </h5>
                                            </td>
                                            <td style=" vertical-align: top;"><textarea class="form-control" name="equipment"  rows="5"><?php echo $row['equipment'] ?></textarea> </td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Current hour: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <input type="time" class="form-control" value="<?php echo $row['hour'] ?>" name="hour">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Contract Expires: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <input type="date" class="form-control" value="<?php echo $row['expire'] ?>" name="expire" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Total Budget: </h5>
                                            </td>
                                            <td style=" vertical-align: top;"> <input type="text" class="form-control" value="<?php echo $row['total_budget'] ?>" name="total_budget"></td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Inspector Name: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <input type="text" class="form-control" value="<?php echo $row['inspectior_name'] ?>" name="inspectior_name">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <h5>Qoute needed by: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <input type="date" class="form-control" value="<?php echo $row['qoute'] ?>" name="qoute" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <br>
                            <div class="form-row"><br>
                                <div class="col">
                                    <button type="submit" id='submit' name="submit" class="btn btn-primary " value="Save">Save the form data</button>
                                    <button type="button" class="btn btn-secondary" onclick="reloadThePage()">Reset</button>

                                </div>
                            </div>
                            <br>

                        </form>
                    </div>
                    <div class="col"></div>
                </div>
            </div>

            <!-- Content Row -->

            <?php
            include('includes/scripts.php');
            include('includes/footer.php');
            ?>

        </div>
        <script>
            function reloadThePage() {
                window.location.reload();
            }
        </script>


</body>

</html>