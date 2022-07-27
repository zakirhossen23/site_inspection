<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>user page</title>
</head>
<body>

	<?php
    include('includes/header.php');
    include('includes/navbar.php');
    include("include/connection.php");
    ?>
    
    <?php

    $output = "";
    ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>
</div>


  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>

</body>
</html>