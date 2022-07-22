  <?php
session_start();
include("include/connection.php");

if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: include/connection.php");
}
?>