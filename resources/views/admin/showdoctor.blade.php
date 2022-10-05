
<!DOCTYPE html>
<html lang="en">
  <body>
  @include('admin.css')

  </body>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
  
      @include('admin.sidebar')
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">
            <div algin="center" style="padding-top: 100px;">
                <table>
                    <tr style="background-color: black;">
                        <th style="padding: 10px; ">Doctor Name</th>
                        <th style="padding: 10px;">Phone</th>
                        <th style="padding: 10px;">Speciality</th>
                        <th style="padding: 10px;">Room</th>
                        <th style="padding: 10px">Image</th>
                        <th style="padding: 10px">Update</th>
                        <th style="padding: 10px">Delete</th>


                        
                    </tr>
                    @foreach($doctors as $doctor)
                    <tr align="center" style="background-color:skyblue">
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->phone}}</td>
                        <td>{{$doctor->speciality}}</td>
                        <td>{{$doctor->room}}</td>
                        <td> <img height="100px" width="100px" src="doctor_image/{{$doctor->image}}"></td>
                        <td>
                            <a class="btn btn-primary" href="{{url('update_doctor',$doctor->id)}}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you Sure')" href="{{url('deleted',$doctor->id)}}">Delete</a>
                        </td>
                        
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>

        <!-- partial -->
        <!-- main-panel ends -->
      <!-- page-body-wrapper ends -->
    @include('admin.script')
  </body>
</html>