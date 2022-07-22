<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Site inspector Page</title>
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

   


    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Inspection Dashboard</h1>
        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
           
       <!-- Content Row -->
       <?php include("include/head.php"); ?>
                    <div class="container">
                        <!-- Content Row -->
                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">No of Inspections</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php

                                                $query = "SELECT ID FROM inspections ORDER BY ID";
                                                $query_run = mysqli_query($connect, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo '<h4> Active Inspections: ' . $row . '</h4>';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
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