<?php
$connection=mysqli_connect("localhost","root","","site_inspection");


if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit();
}

$stck = $_POST['Stock'];
$itm = $_POST['Items'];

if (isset($_POST['submit'])) {
   $query = "SELECT * FROM $users WHERE username = $username";

   $data = mysqli_query($connection, $query) ;

   if (!$data) {
       echo("Error description: " . mysqli_error($mysqli));
   } else {

       while ($row = mysqli_fetch_array($data)) {
           echo "<tr>
                <td>" . $row['No'] . "</td>
                <td>" . $row['Qty'] . "</td>
                <td>" . $row['date'] . "</td>
                <td>" . $row['Sold'] . "</td>
                <td>" . $row['Total'] . "</td>
              </tr>";
       }
   }
}
?>