<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <title>All Inspections | Site Inspection</title>
   <link rel="stylesheet" href="/css/dashboard.css" />
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
   <div class="container">
      @include('componenet\nav\inspectornav')

      <section class="main">
         <div class="main-top">
            <h1>All Inspections</h1>
            <div>
               Inspector
               <i class="fas fa-user"></i>
            </div>

         </div>
         <section class="inspector">
            <div class="inspector-list">

               @if(Session::get('success'))
               <div class="alert alert-success">
                  {{ Session::get('success') }}
               </div>
               @endif

               @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
               @endif

               @csrf
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
                        <th>Edit</th>
                        <th>Delete</th>
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
                        <td>
                           <form action="/inspection/edit" method="get">
                              <input type="hidden" name="edit_id" value="{{ $inspection->id }}">
                              <button type="submit">EDIT</button>
                           </form>

                        </td>
                        <td>
                           <form action="/inspection/delete" method="get">
                              <input type="hidden" name="id" value="{{ $inspection->id }}">
                              <button type="submit">Delete</button>
                           </form>

                        </td>
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