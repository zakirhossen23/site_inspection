<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <title>Register Inspector | Site Inspection</title>
   <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="/css/style.css" />
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
   <link rel="stylesheet" href="/css/dashboard.css" />
</head>

<body>
   <div class="container" style="margin: 0;width: 100%;padding: 0;">
      @include('componenet\nav\managernav')

      <section class="main">
         <div class="main-top">
            <h1>Register Inspector</h1>
            <div>
               Manager
               <i class="fas fa-user-cog"></i>
            </div>

         </div>
         <section class="inspector">
         <div class="col-md-4 col-md-offset-4" style="background: white;padding: 25px;">
     
            <form action="{{ route('auth.save') }}" method="post">

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
               <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control" name="fullname" placeholder="Enter full name" value="{{ old('fullname') }}">
                  <span class="text-danger">@error('fullname'){{ $message }} @enderror</span>
               </div>
               <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                  <span class="text-danger">@error('email'){{ $message }} @enderror</span>
               </div>
               <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control" name="gender" aria-label="Gender" >
                     <option selected>Select Gender</option>
                     <option value="male">Male</option>
                     <option value="female">Female</option>
                  </select>
                  <span class="text-danger">@error('gender'){{ $message }} @enderror</span>
               </div>
               <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="role" aria-label="Role" >
                     <option selected>Select Role</option>
                     <option value="site_inspector">Site_inspector</option>
                  </select>
                  <span class="text-danger">@error('role'){{ $message }} @enderror</span>
               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter password">
                  <span class="text-danger">@error('password'){{ $message }} @enderror</span>
               </div>
               <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control" name="cpassword" placeholder="Enter password">
                  <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
               </div>
               <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
            </form>
         </div>
         </section>
      </section>
   </div>

</body>

</html>



