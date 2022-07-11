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
    include('includes/nav/sfnavbar.php');
    include("include/connection.php");
    ?>

    <?php

    $output = "";

    if (isset($_POST['submit'])) {
        $date = str_replace("'", "\'", $_POST["date"]);
        $site =      str_replace("'", "\'", $_POST['site']);
        $completion =      str_replace("'", "\'", $_POST['completion']);
        $workarea =     str_replace("'", "\'", $_POST['workarea']);
        $description =     str_replace("'", "\'", $_POST['description']);
        $supervisor =         str_replace("'", "\'", $_POST['supervisor']);
        $inspector =     str_replace("'", "\'", $_POST['inspector']);
        $inspectiontype =     str_replace("'", "\'", $_POST['inspectiontype']);

        $A = str_replace("'", "\'", $_POST["A"]);
        $B = str_replace("'", "\'", $_POST["B"]);
        $C = str_replace("'", "\'", $_POST["C"]);
        $D = str_replace("'", "\'", $_POST["D"]);
        $E = str_replace("'", "\'", $_POST["E"]);
        $F = str_replace("'", "\'", $_POST["F"]);
        $G = str_replace("'", "\'", $_POST["G"]);

        $Section = str_replace("'", "\'", $_POST["Section"]);
        $Interventions = str_replace("'", "\'", $_POST["Interventions"]);


        $error = array();

        if (empty($date)) {
            $error['error'] = "Date is Empty";
        } else if (empty($site)) {
            $error['error'] = "Site is empty";
        } else if (empty($inspectiontype)) {
            $error['error'] = "Inspection Type is empty";
        }

        if (isset($error['error'])) {
            $output .= $error['error'];
        } else {
            $output .= "";
        }


        if (count($error) < 1) {

            $query = "INSERT INTO `inspections`( `date`, `site`, `completion`, `workarea`, `description`, `supervisor`, `inspector`, `inspectiontype`, `A1`, `A2`, `A3`, `A4`, `A5`, `B1`, `B2`, `B3`, `B4`, `B5`, `C1`, `C2`, `C3`, `C4`, `C5`, `D1`, `D2`, `D3`, `D4`, `D5`, `E1`, `E2`, `E3`, `E4`, `E5`, `F1`, `F2`, `F3`, `F4`, `F5`, `G1`, `G2`, `G3`, `G4`, `G5`, `Section`, `Interventions`) VALUES 
            ('$date','$site','$completion','$workarea','$description','$supervisor','$inspector','$inspectiontype','$A[0]','$A[1]','$A[2]','$A[3]','$A[4]','$B[0]','$B[1]','$B[2]','$B[3]','$B[4]','$C[0]','$C[1]','$C[2]','$C[3]','$C[4]','$D[0]','$D[1]','$D[2]','$D[3]','$D[4]','$E[0]','$E[1]','$E[2]','$E[3]','$E[4]','$F[0]','$F[1]','$F[2]','$F[3]','$F[4]','$G[0]','$G[1]','$G[2]','$G[3]','$G[4]','$Section','$Interventions')";

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
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Site Inspection Form</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">


            <!-- Content Row -->
            <?php include("include/head.php"); ?>
            <div class="container">
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
                                        <td> <input type="text" class="form-control" name="inspector"></td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Site Name: </h5>
                                        </td>
                                        <td> <input type="text" class="form-control" name="site"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Inspection Type: </h5>
                                        </td>
                                        <td><input type="text" class="form-control" name="inspectiontype"></td>
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
                                            <textarea class="form-control" name="description" rows="4"></textarea>
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
                                            <textarea class="form-control" name="measure" rows="5"></textarea>
                                   
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         


                            <br>
                            <div class="form-row"><br>
                                <div class="col">
                                    <button type="submit" id='submit' name="submit" class="btn btn-primary " value="Save">Save the form data</button>
                                    <button type="button" id='submit' name="submit" class="btn btn-secondary" value="Save">Reset</button>
                               
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


</body>

</html>