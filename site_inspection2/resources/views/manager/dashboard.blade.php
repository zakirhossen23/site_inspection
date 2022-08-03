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
            <h1>Site Inspector</h1>
            <div>
               Manager
               <i class="fas fa-user-cog"></i>
            </div>

         </div>
         <section class="inspector">
            <div class="inspector-list">
               <div class="Add-User">
                  <a href="register">Add Inspector</a>
               </div>
               <table class="table">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Role</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($Inspectors as $inspector)
                     <tr>
                        <td>{{ $inspector->id }}</td>
                        <td>{{ $inspector->fullname }}</td>
                        <td>{{ $inspector->email }}</td>
                        <td>{{ $inspector->gender }}</td>
                        <td>{{ $inspector->role }}</td>
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