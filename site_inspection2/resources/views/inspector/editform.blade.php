<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <title>Edit Inspection | Site Inspection</title>
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
   <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="/css/inspection_form.css" />
</head>

<body>
   <div class="container" style="margin: 0;width: 100%;padding: 0;">

      @include('componenet\nav\inspectornav')


      <section class="main">
         <div class="main-top">
            <h1>Edit Inspection</h1>
            <div>
               Inspector
               <i class="fas fa-user"></i>
            </div>

         </div>

         <section class="inspector">
            <div class="inspector-list">
               <div class="table">
                  <div style="margin: 0 40px 0 40px;">
                     <div>
                        <div>

                           <form action="{{ route('inspection.update') }}" method="post">

                              <input type="hidden" name="id" value="{{ $InspectionDetails->id }}" />
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
                              <div style="display: flex; gap: 5px;">
                                 <table style="width: 50%; column-gap:14px">
                                    <tbody>
                                       <tr>
                                          <td style="width: 21%;">
                                             <h5>Date: </h5>
                                          </td>
                                          <td style="width: 26%;"><input value="{!! date('Y-m-j', strtotime($InspectionDetails->date)) !!}" type="date" class="form-control" name="date" /></td>

                                       </tr>

                                       <tr>
                                          <td style="width: 100%;">
                                             <span class="text-danger">@error('date'){{ $message }} @enderror</span>
                                          </td>
                                       </tr>

                                       <tr>
                                          <td>
                                             <h5>Client Name:</h5>
                                          </td>
                                          <td> <input type="text" value="{{ $InspectionDetails->client_name }}" class="form-control" name="client_name"></td>
                                       </tr>
                                       <tr>
                                          <td style="width: 100%;">
                                             <span class="text-danger">@error('client_name'){{ $message }} @enderror</span>
                                          </td>
                                       </tr>

                                       <tr>
                                          <td>
                                             <h5>Client Representative:</h5>
                                          </td>
                                          <td> <input type="text" value="{{ $InspectionDetails->client_representative }}" class="form-control" name="client_representative"></td>
                                       </tr>
                                       <tr>
                                          <td style="width: 100%;">
                                             <span class="text-danger">@error('client_representative'){{ $message }} @enderror</span>
                                          </td>
                                       </tr>


                                       <tr>
                                          <td>
                                             <h5>Site Address: </h5>
                                          </td>
                                          <td> <input type="text" value="{{ $InspectionDetails->site_address }}" class="form-control" name="site_address"></td>
                                       </tr>
                                       <tr>
                                          <td style="width: 100%;">
                                             <span class="text-danger">@error('site_address'){{ $message }} @enderror</span>
                                          </td>
                                       </tr>

                                       <tr>
                                          <td>
                                             <h5>Equipment: </h5>
                                          </td>
                                          <td><textarea class="form-control" rows="5" name="equipment">{{ $InspectionDetails->client_name }}</textarea> </td>
                                       </tr>
                                       <tr>
                                          <td style="width: 100%;">
                                             <span class="text-danger">@error('equipment'){{ $message }} @enderror</span>
                                          </td>
                                       </tr>

                                       <tr>
                                          <td style="vertical-align: top;">
                                             <h5>Qoute needed by: </h5>
                                          </td>
                                          <td>
                                             <input type="date" value="{!! date('Y-m-j', strtotime($InspectionDetails->qoute)) !!}" class="form-control" name="qoute" />
                                          </td>
                                       </tr>
                                       <tr>
                                          <td style="width: 100%;">
                                             <span class="text-danger">@error('qoute'){{ $message }} @enderror</span>
                                          </td>
                                       </tr>

                                       <tr>
                                          <td style="width: 45%;">
                                             <h5>Current Contract Expires: </h5>
                                          </td>
                                          <td>
                                             <input type="date" value="{!! date('Y-m-j', strtotime($InspectionDetails->expire)) !!}" class="form-control" name="expire" />
                                          </td>
                                       </tr>
                                       <tr>
                                          <td style="width: 100%;">
                                             <span class="text-danger">@error('expire'){{ $message }} @enderror</span>
                                          </td>
                                       </tr>


                                       <tr>
                                          <td style=" vertical-align: top;">
                                             <h5>Current hours in place: </h5>
                                          </td>
                                          <td style=" vertical-align: top;">
                                             <textarea class="form-control" name="place" rows="5">{{ $InspectionDetails->place }}</textarea>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td style="width: 100%;">
                                             <span class="text-danger">@error('place'){{ $message }} @enderror</span>
                                          </td>
                                       </tr>

                                    </tbody>
                                 </table>
                                 <table style="width: 50%; column-gap:14px">
                                    <tbody>

                                       <tr>
                                          <td>
                                             <h5>Consumables: </h5>
                                          </td>
                                          <td><textarea class="form-control" rows="4" name="consumablese">{{ $InspectionDetails->consumablese }}</textarea> </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <span class="text-danger">@error('consumablese'){{ $message }} @enderror</span>
                                          </td>
                                       </tr>

                                       <tr>
                                          <td style=" vertical-align: top;">
                                             <h5>Why are you looking to change contractors: </h5>
                                          </td>
                                          <td style=" vertical-align: top;">
                                             <textarea class="form-control" name="contractors" rows="5">{{ $InspectionDetails->contractors }}</textarea>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <span class="text-danger">@error('contractors'){{ $message }} @enderror</span>
                                          </td>
                                       </tr>

                                       <tr>
                                          <td style=" vertical-align: top;">
                                             <h5>Do you have price/Budget:</h5>
                                          </td>
                                          <td style=" vertical-align: top;">
                                             <textarea class="form-control" name="price" rows="5">{{ $InspectionDetails->price }}</textarea>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <span class="text-danger">@error('price'){{ $message }} @enderror</span>
                                          </td>
                                       </tr>

                                       <tr>
                                          <td style=" vertical-align: top;">
                                             <h5>Inspector Name: </h5>
                                          </td>
                                          <td style=" vertical-align: top;">
                                             <textarea class="form-control" name="inspector" rows="5">{{ $InspectionDetails->inspector }}</textarea>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <span class="text-danger">@error('inspector'){{ $message }} @enderror</span>
                                          </td>
                                       </tr>

                                    </tbody>
                                 </table>
                              </div>


                              <br>
                              <div class="form-row"><br>
                                 <div class="col">
                                    <button type="submit" id='submit' name="submit" class="btn " value="Update">Update</button>
                                    <button type="button" class="btn btn-secondary" onclick="reloadPage()">Reset</button>

                                 </div>
                              </div>
                              <br>

                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </section>
   </div>
   <script>
      function reloadPage() {
         window.location.reload();
      }
   </script>

</body>

</html>