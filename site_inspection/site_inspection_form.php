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
        $date = str_replace("'", "\'", $_POST["date"]);
        $client_name = str_replace("'", "\'", $_POST["client_name"]);
        $client_representative = str_replace("'", "\'", $_POST["client_representative"]);
        $site_address = str_replace("'", "\'", $_POST["site_address"]);
        $equipment = str_replace("'", "\'", $_POST["equipment"]);
        $consumablese = str_replace("'", "\'", $_POST["consumablese"]);
        $qoute = str_replace("'", "\'", $_POST["qoute"]);
        $place = str_replace("'", "\'", $_POST["place"]);
        $Contact = str_replace("'", "\'", $_POST["Contact"]);
        $expire = str_replace("'", "\'", $_POST["expire"]);
        $contractors = str_replace("'", "\'", $_POST["contractors"]);
        $price = str_replace("'", "\'", $_POST["price"]);
        $inspector = str_replace("'", "\'", $_POST["inspector"]);

        $error = array();

        if (empty($date)) {
            $error['error'] = "Date is Empty";
        } else if (empty($site_name)) {
            $error['error'] = "Site Name is empty";
        } else if (empty($inspection_type)) {
            $error['error'] = "Inspection Type is empty";
        }

        if (isset($error['error'])) {
            $output .= $error['error'];
        } else {
            $output .= "";
        }


        if (count($error) < 1) {

            $query = "INSERT INTO `inspections`( `date`, `client_name`, `client_representative`, `site_address`, `equipment`, `consumablese`, `qoute`, `place`, `Contact`, `expire`, `contractors`, `price`, `inspector`) VALUES ('$date','$client_name','$client_representative','$site_address','$equipment','$consumablese','$qoute','$place','$Contact','$contractors','$price','$inspector')";

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
                            <div style="display: flex;">
                                <table style="width: 550px; column-gap:14px">
                                    <tbody>
                                        <tr>
                                            <td style="width: 21%;">
                                                <h5>Date: </h5>
                                            </td>
                                            <td style="width: 26%;"><input type="date" class="form-control" name="date" /></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5>Client Name:</h5>
                                            </td>
                                            <td> <input type="text" class="form-control" name="client_name"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Client Representative:</h5>
                                            </td>
                                            <td> <input type="text" class="form-control" name="client_representative"></td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <h5>Site Address: </h5>
                                            </td>
                                            <td> <input type="text" class="form-control" name="site_address"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Equipment: </h5>
                                            </td>
                                            <td><textarea class="form-control" name="equipment"></textarea> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Consumables: </h5>
                                            </td>
                                            <td><textarea class="form-control" name="consumablese"></textarea> </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <h5>Qoute needed by: </h5>
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="qoute" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Current hours in place: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <textarea class="form-control" name="place" rows="5"></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="width: 450px; column-gap:14px">
                                    <tbody>
                                        <tr>
                                            <td style="width: 45%;">
                                                <h5>Current Contract Expires: </h5>
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="expire" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Why are you looking to change contractors: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <textarea class="form-control" name="contractors" rows="5"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Do you have price/Budget:</h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <textarea class="form-control" name="price" rows="5"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Inspector Name: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <textarea class="form-control" name="inspector" rows="5"></textarea>
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