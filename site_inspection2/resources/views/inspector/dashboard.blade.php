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
                  <h1 style="vertical-align: middle;">{{ $TotalInspection }}</h1>
               </div>
               <p>Total Active Inspections</p>
               <a href="/all-inspection">View All</a>
            </div>
         </div>

         <section class="inspector">
            <div class="inspector-list">
               <h1>Latest 5 Inspections</h1>
               <table class="table">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Client Name</th>
                        <th>Site Address</th>
                        <th>Equipment</th>
                        <th>Place</th>
                        <th>Contractors</th>
                        <th>Price</th>
                        <th>Inspector</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach ($AllInspections as $inspection)
                     <tr>
                        <td>{{ $inspection->id }}</td>
                        <td>{!! date('d/m/y', strtotime($inspection->date)) !!}</td>
                        <td>{{ $inspection->client_name }}</td>
                        <td>{{ $inspection->site_address }}</td>
                        <td>{{ $inspection->equipment }}</td>
                        <td>{{ $inspection->place }}</td>
                        <td>{{ $inspection->contractors }}</td>
                        <td>{{ $inspection->price }}</td>
                        <td>{{ $inspection->inspector }}</td>
                       
                     </tr>
                     @endforeach

                  </tbody>
               </table>
            </div>
         </section>
      </section>
   </div>

</body>

</html>