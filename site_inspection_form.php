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
    }else{
        
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
    <div class="row">
        <div class="col"></div>
        <div class="col-md-8">
            <div class="text-center"><?php echo $output; ?></div>
            <form action="" method="post" enctype="">
                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <td>
                                <h5>Date of Inspection: </h5>
                            </td>
                            <td><input type="date" class="form-control" name="date" /></td>

                        </tr>
                        <tr>
                            <td>
                                <h5>Site: </h5>
                            </td>
                            <td> <input type="text" class="form-control" name="site"></td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Completed by: </h5>
                            </td>
                            <td> <input type="text" class="form-control" name="completion"></td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Work Area: </h5>
                            </td>
                            <td><input type="text" class="form-control" name="workarea"></td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Job description: </h5>
                            </td>
                            <td><input type="text" class="form-control" name="description"></td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Supervisor: </h5>
                            </td>
                            <td><input type="text" class="form-control" name="supervisor"></td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Inspector: </h5>
                            </td>
                            <td><input type="text" class="form-control" name="inspector"></td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Inspection Type: </h5>
                            </td>
                            <td><input type="text" class="form-control" name="inspectiontype">
                            </td>
                        </tr>
                    </tbody>
                </table>




                <br>
                <h5>A. Working Standards:</h5>
                <div id="dynamic_field2">
                    <div class="form-row">

                        <div class="col">
                            <textarea class="form-control" name="A[0]" placeholder="Activities done" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="A[1]" placeholder="Interventions" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="A[2]" placeholder="Comment" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="A[3]" placeholder="Completed" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="A[4]" placeholder="Action Taken" rows="4"></textarea>
                        </div>
                    </div>
                </div>




                <br>
                <h5>B. Quality:</h5>
                <div id="dynamic_field3">
                    <div class="form-row">

                        <div class="col">
                            <textarea class="form-control" name="B[0]" placeholder="Activities done" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="B[1]" placeholder="Interventions" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="B[2]" placeholder="Comment" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="B[3]" placeholder="Completed" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="B[4]" placeholder="Action Taken" rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <br>
                <h5>C. Site rules:</h5>
                <div id="dynamic_field3">
                    <div class="form-row">

                        <div class="col">
                            <textarea class="form-control" name="C[0]" placeholder="Activities done" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="C[1]" placeholder="Interventions" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="C[2]" placeholder="Comment" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="C[3]" placeholder="Completed" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="C[4]" placeholder="Action Taken" rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <br>
                <h5>D. Environmental :</h5>
                <div id="dynamic_field2">
                    <div class="form-row">

                        <div class="col">
                            <textarea class="form-control" name="D[0]" placeholder="Activities done" rows="4"></textarea>
                        </div>

                        <div class="col">
                            <textarea class="form-control" name="D[1]" placeholder="Interventions" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="D[2]" placeholder="Comment" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="D[3]" placeholder="Completed" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="D[4]" placeholder="Action Taken" rows="4"></textarea>
                        </div>
                    </div>
                </div>




                <br>
                <h5>E. Protection of individual:</h5>
                <div id="dynamic_field3">
                    <div class="form-row">

                        <div class="col">
                            <textarea class="form-control" name="E[0]" placeholder="Activities done" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="E[1]" placeholder="Interventions" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="E[2]" placeholder="Comment" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="E[3]" placeholder="Completed" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="E[4]" placeholder="Action Taken" rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <br>
                <h5>F. Tools, Cables & Other equipments:</h5>
                <div id="dynamic_field3">
                    <div class="form-row">

                        <div class="col">
                            <textarea class="form-control" name="F[0]" placeholder="Activities done" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="F[1]" placeholder="Interventions" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="F[2]" placeholder="Comment" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="F[3]" placeholder="Completed" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="F[4]" placeholder="Action Taken" rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <br>
                <h5>G. Miscellaneous:</h5>
                <div id="dynamic_field3">
                    <div class="form-row">

                        <div class="col">
                            <textarea class="form-control" name="G[0]" placeholder="Activities done" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="G[1]" placeholder="Interventions" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="G[2]" placeholder="Comment" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="G[3]" placeholder="Completed" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="G[4]" placeholder="Action Taken" rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <h5>Total Interventions by Section:</h5>
                <div id="dynamic_field3">
                    <div class="form-row">
                        <div class="col">
                            <textarea class="form-control" name="Section" placeholder="Section" rows="4"></textarea>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="Interventions" placeholder="Interventions" rows="4"></textarea>
                        </div>
                    </div>
                </div>


                <br>
                <div class="form-row"><br>
                    <div class="col">
                        <button type="submit" id='submit' name="submit" class="btn btn-primary " value="Save">Save the form data</button>
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