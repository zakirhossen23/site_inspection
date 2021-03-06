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
    include('includes/nav/sallnavbar.php');
    include("include/connection.php");
    ?>

    <?php

    $output = "";




    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Inspections</h1>
        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <!-- Content Row -->
            <?php include("include/head.php"); ?>
            <div class="container">
                <!-- Content Row -->
                <div class="table-responsive">
                        <?php
                        $query = "SELECT * FROM inspections";
                        $query_run = mysqli_query($connect, $query);
                        ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Title</th> 
                                    <th>Inspector Name</th>
                                    <th>Type</th>
                                    <th>Severity</th>
                                    <th>Site Name</th>
                                    <th>Whom To Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['ID']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['inspector_name']; ?></td>
                                            <td><?php echo $row['inspection_type']; ?></td>
                                            <td><?php echo $row['severity']; ?></td>
                                            <td><?php echo $row['site_name']; ?></td>
                                            <td><?php echo $row['Contact']; ?></td>
                                            <td>
                                                <form action="site_inspection_edit.php" method="post">
                                                    <input type="hidden" name="edit_id" value="<?php echo $row['ID']; ?>">
                                                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="code.php" method="post">
                                                    <input type="hidden" name="delete_id" value="<?php echo $row['ID']; ?>">
                                                    <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "No Record Found";
                                }
                                ?>
                            </tbody>
                        </table>

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