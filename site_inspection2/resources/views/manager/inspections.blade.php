<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <title>Register Inspector | Site Inspection</title>
   <link rel="stylesheet" href="/css/dashboard.css" />
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
   <div class="container">
      @include('componenet\nav\managernav')

      <section class="main">
         <div class="main-top">
            <h1>Site inspections</h1>
            <div>
               Manager
               <i class="fas fa-user-cog"></i>
            </div>

         </div>
         <section class="inspector">
            <div class="inspector-list">
   
               <table class="table">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Client Name</th>
                        <th>Site Address</th>
                        <th>Equipment</th>
                        <th>Place</th>
                        <th>Contact</th>
                        <th>Contractors</th>
                        <th>Price</th>
                        <th>Inspector</th>
                        <th>Edit</th>
                        <th>Delete</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>01</td>
                        <td>03-24-22</td>
                        <td>Sam David</td>
                        <td>Design</td>
                        <td>8:00AM</td>
                     </tr>
                     <tr >
                        <td>02</td>
                        <td>03-24-22</td>
                        <td>Balbina Kherr</td>
                        <td>Coding</td>
                        <td>9:00AM</td>
                     </tr>
                     <tr>
                        <td>03</td>
                        <td>03-24-22</td>
                        <td>Badan John</td>
                        <td>testing</td>
                        <td>8:00AM</td>
                     </tr>
                     <tr>
                        <td>04</td>
                        <td>03-24-22</td>
                        <td>Sara David</td>
                        <td>Design</td>
                        <td>8:00AM</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </section>
      </section>
   </div>

</body>

</html>