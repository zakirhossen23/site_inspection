<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Login</title>
   <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css') }}">
</head>

<body style="background-color: #F1F5F8">
   @include('componenet\header')

   <div class="container">
      <div class="row" style="margin-top:45px">
         <div class="col-md-4 col-md-offset-4" style="background: white;padding: 25px;"> 
            <h4>Login | Site Inspection</h4>
            <hr>
            <form action="{{ route('auth.check') }}" method="post">
               @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
               @endif

               @csrf
               <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                  <span class="text-danger">@error('email'){{ $message }} @enderror</span>
               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter password">
                  <span class="text-danger">@error('password'){{ $message }} @enderror</span>
               </div>
               <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="role" aria-label="Role">
                     <option selected>Select Role</option>
                     <option value="site_inspector">Site_inspector</option>
                     <option value="manager">Manager</option>
                  </select>
                  <span class="text-danger">@error('password'){{ $message }} @enderror</span>
               </div>
               <button type="submit" class="btn btn-block btn-primary">Sign In</button>
               <br>
               <a href="{{ route('auth.register') }}">I don't have an account, create new</a>
            </form>
         </div>
      </div>
   </div>

</body>

</html>