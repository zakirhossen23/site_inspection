<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Site inspection Form</title>
    <style>
        tr td input {
            width: 300px;
        }
    </style>
</head>

<body>

    <?php
    include('includes/header.php');
    include('includes/snavbar.php');
    include("include/connection.php");
    ?>

    <?php

    $output = "";

    if (isset($_POST['submit'])) {

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

            $query = "INSERT INTO `inspections`( `client_name`, `date`, `site_name`, `address1`, `address2`, `title`, `post_code`, `site_description`, `equipment`, `hour`, `expire`, `total_budget`, `inspectior_name`, `qoute`) VALUES ('$client_name','$date','$site_name','$address1','$address2','$title','$post_code','$site_description','$equipment','$hour','$expire','$total_budget','$inspectior_name','$qoute')";

            $res = mysqli_query($connect, $query);

            if ($res) {
                $output .= "Successfully Saved!";
            } else {
                $output .= "Failed to Save Form Data";
            }
        }
    } else {
    }


    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800" style="top: 20px;left: 150px;font-weight: bold;position: absolute;">Site Inspection Form</h1>

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
                            <div style="display: flex; gap:20px">
                                <table style="width: 550px; column-gap:14px">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5>Client Name:</h5>
                                            </td>
                                            <td> <input type="text" class="form-control" name="client_name"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 21%;">
                                                <h5>Date: </h5>
                                            </td>
                                            <td style="width: 26%;"><input type="date" class="form-control" name="date" /></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Site Name:</h5>
                                            </td>
                                            <td> <input type="text" class="form-control" name="site_name"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Address line 1: </h5>
                                            </td>
                                            <td> <input type="text" class="form-control" name="address1"></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5>Address line 2: </h5>
                                            </td>
                                            <td> <input type="text" class="form-control" name="address2"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Post code: </h5>
                                            </td>
                                            <td> <input type="text" class="form-control" name="post_code"></td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Site Description: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <textarea class="form-control" name="site_description" rows="5"></textarea>
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
                                            <td style=" vertical-align: top;"><textarea class="form-control" name="equipment"  rows="5"></textarea> </td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Current hour: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <input type="time" class="form-control" name="hour">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Contract Expires: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <input type="date" class="form-control" name="expire" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Total Budget: </h5>
                                            </td>
                                            <td style=" vertical-align: top;"> <input type="text" class="form-control" name="total_budget"></td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Inspector Name: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <input type="text" class="form-control" name="inspectior_name">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <h5>Qoute needed by: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <input type="date" class="form-control" name="qoute" />
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