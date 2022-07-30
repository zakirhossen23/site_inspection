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
    include('includes/snavbar.php');
    include("include/connection.php");
    ?>

    <?php

    $output = "";
    $row = null;
    $id = -1;
    if (isset($_POST['submit'])) {

        $id = $_POST['edit_id'];
        $date = str_replace("'", "\'", $_POST["date"]);
        $inspector_name = str_replace("'", "\'", $_POST["inspector_name"]);
        $site_name = str_replace("'", "\'", $_POST["site_name"]);
        $inspection_type = str_replace("'", "\'", $_POST["inspection_type"]);
        $title = str_replace("'", "\'", $_POST["title"]);
        $description = str_replace("'", "\'", $_POST["description"]);
        $severity = str_replace("'", "\'", $_POST["severity"]);
        $measure = str_replace("'", "\'", $_POST["measure"]);
        $Contact = str_replace("'", "\'", $_POST["Contact"]);
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

            $query = "UPDATE `inspections` SET `date` = '$date',`inspector_name` = '$inspector_name',`site_name` = '$site_name',`inspection_type` = '$inspection_type',`title` = '$title',`description` = '$description',`severity` = '$severity',`measure` = '$measure',`Contact` = '$Contact' WHERE `ID` = '$id'";

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
            <h1 class="h3 mb-0 text-gray-800">Edit Site Inspection</h1>
        </div>

        <!-- Content Row -->
        <div class="row">


            <!-- Content Row -->
            <?php include("include/head.php"); ?>
            <div class="container">
                <div>
                    <div class="col"></div>
                    <div>
                        <div class="text-center"><?php echo $output; ?></div>
                        <form action="" method="post" enctype="">
                            <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                            <div style="display: flex;">
                                <table style="width: 550px; column-gap:14px">
                                    <tbody>
                                        <tr>
                                            <td style="width: 21%;">
                                                <h5>Date: </h5>
                                            </td>
                                            <td style="width: 26%;"><input type="date" value="<?php echo $row['date'] ?>" class="form-control" name="date" /></td>

                                            <td style="width: 3%;"></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5>Inspector Name:</h5>
                                            </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $row['inspector_name'] ?>" name="inspector_name"></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Site Name: </h5>
                                            </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $row['site_name'] ?>" name="site_name"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Inspection Type: </h5>
                                            </td>
                                            <td><input type="text" class="form-control" value="<?php echo $row['inspection_type'] ?>" name="inspection_type"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Title: </h5>
                                            </td>
                                            <td><input type="text" class="form-control" value="<?php echo $row['title'] ?>" name="title"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <h5>Description: </h5>
                                            </td>
                                            <td>
                                                <textarea class="form-control" name="description" rows="description"><?php echo $row['description'] ?></textarea>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <table style="width: 450px; column-gap:14px">
                                    <tbody>
                                        <tr>

                                            <td style="width: 45%;">
                                                <h5>Severity: </h5>
                                            </td>
                                            <td>
                                                <select class="form-control" value="<?php echo $row['severity'] ?>" name="severity">
                                                    <option value="High">High</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Low">Low</option>
                                                </select>
                                            </td>


                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Corrective Measure: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <textarea class="form-control" name="measure" rows="5"><?php echo $row['measure'] ?></textarea>

                                            </td>

                                        </tr>
                                        <tr>
                                            <td style=" vertical-align: top;">
                                                <h5>Whom To Contact: </h5>
                                            </td>
                                            <td style=" vertical-align: top;">
                                                <textarea class="form-control" name="Contact" rows="5"><?php echo $row['Contact'] ?></textarea>

                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <br>
                            <div>
                                <input type="checkbox" name="genRep" value="Generate Report?" />
                                Generate Report?
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