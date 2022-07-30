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

            $query = "INSERT INTO `inspections`( `date`, `inspector_name`, `site_name`, `inspection_type`, `title`, `description`, `severity`, `measure`, `Contact`) VALUES
            ('$date','$inspector_name','$site_name','$inspection_type','$title','$description','$severity','$measure','$Contact')";

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
                    <div >
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

                                        <td style="width: 3%;"></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5>Inspector Name:</h5>
                                        </td>
                                        <td> <input type="text" class="form-control" name="inspector_name"></td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Site Name: </h5>
                                        </td>
                                        <td> <input type="text" class="form-control" name="site_name"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Inspection Type: </h5>
                                        </td>
                                        <td><input type="text" class="form-control" name="inspection_type"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Title: </h5>
                                        </td>
                                        <td><input type="text" class="form-control" name="title"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">
                                            <h5>Description: </h5>
                                        </td>
                                        <td>
                                            <textarea class="form-control" name="description" rows="description"></textarea>
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
                                            <select class="form-control" name="severity">
                                                <option value="High">High</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Low">Low</option>
                                            </select>
                                        </td>


                                    </tr>
                                    <tr>
                                        <td style=" vertical-align: top;" >
                                            <h5>Corrective Measure: </h5>
                                        </td>
                                        <td  style=" vertical-align: top;">
                                            <textarea class="form-control" name="measure" rows="5"></textarea>
                                   
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style=" vertical-align: top;" >
                                            <h5>Whom To Contact: </h5>
                                        </td>
                                        <td  style=" vertical-align: top;">
                                            <textarea class="form-control" name="Contact" rows="5"></textarea>
                                   
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
function reloadThePage(){
    window.location.reload();
} 
</script>


</body>

</html>