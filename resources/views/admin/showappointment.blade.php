
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
                        <th style="padding: 10px; ">Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Approved</th>
                        <th>Cancel</th>
                    </tr>
                    @foreach($datas as $data)
                    <tr align="center" style="background-color:skyblue">
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->doctor}}</td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->message}}</td>
                        <td>{{$data->status}}</td>
                        <td>
                            <a class="btn btn-success" href="{{url('approved',$data->id)}}">Approved</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{url('canceled',$data->id)}}">Cancel</a>
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