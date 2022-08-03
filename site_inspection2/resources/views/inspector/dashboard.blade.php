<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <title>inspector Dashboard | Site Inspection</title>
   <link rel="stylesheet" href="/css/dashboard.css" />
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
   <div class="container">
   
   @include('componenet\nav\inspectornav')


      <section class="main">
      <div class="main-top">
            <h1>Dashboard</h1>
            <div>
               Inspector
               <i class="fas fa-user"></i>
            </div>

         </div>
         <div class="users">
            <div class="card">
               <div style="display: flex;justify-content: center;align-items: center;align-content: center;height: 54px;">
                  <h1 style="vertical-align: middle;">5</h1>
               </div>
               <p>Total Active Inspections</p>
               <button>View All</button>
            </div>
         </div>

         <section class="inspector">
            <div class="inspector-list">
               <h1>Latest Inspections</h1>
               <table class="table">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Depart</th>
                        <th>Date</th>
                        <th>Join Time</th>
                        <th>Logout Time</th>
                        <th>Details</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>01</td>
                        <td>Sam David</td>
                        <td>Design</td>
                        <td>03-24-22</td>
                        <td>8:00AM</td>
                        <td>3:00PM</td>
                        <td><button>View</button></td>
                     </tr>
                     <tr class="active">
                        <td>02</td>
                        <td>Balbina Kherr</td>
                        <td>Coding</td>
                        <td>03-24-22</td>
                        <td>9:00AM</td>
                        <td>4:00PM</td>
                        <td><button>View</button></td>
                     </tr>
                     <tr>
                        <td>03</td>
                        <td>Badan John</td>
                        <td>testing</td>
                        <td>03-24-22</td>
                        <td>8:00AM</td>
                        <td>3:00PM</td>
                        <td><button>View</button></td>
                     </tr>
                     <tr>
                        <td>04</td>
                        <td>Sara David</td>
                        <td>Design</td>
                        <td>03-24-22</td>
                        <td>8:00AM</td>
                        <td>3:00PM</td>
                        <td><button>View</button></td>
                     </tr>
                     <!-- <tr >
                <td>05</td>
                <td>Salina</td>
                <td>Coding</td>
                <td>03-24-22</td>
                <td>9:00AM</td>
                <td>4:00PM</td>
                <td><button>View</button></td>
              </tr>
              <tr >
                <td>06</td>
                <td>Tara Smith</td>
                <td>Testing</td>
                <td>03-24-22</td>
                <td>9:00AM</td>
                <td>4:00PM</td>
                <td><button>View</button></td>
              </tr> -->
                  </tbody>
               </table>
            </div>
         </section>
      </section>
   </div>

</body>

</html>