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
                  @foreach ($AllInspections as $inspection)
                     <tr>
                        <td>{{ $inspection->id }}</td>
                        <td>{{ $inspection->date }}</td>
                        <td>{{ $inspection->client_name }}</td>
                        <td>{{ $inspection->site_address }}</td>
                        <td>{{ $inspection->equipment }}</td>
                        <td>{{ $inspection->place }}</td>
                        <td>{{ $inspection->Contact }}</td>
                        <td>{{ $inspection->contractors }}</td>
                        <td>{{ $inspection->price }}</td>
                        <td>{{ $inspection->inspector }}</td>
                        <td><button>Edit</button></td>
                        <td><button>Delete</button></td>
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