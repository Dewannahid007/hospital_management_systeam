
<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
        label{
        display: inline-block;
        width: 200px;
        }

    </style>
  @include('admin.css')
  </head>

  </body>

    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
  
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <div class="container" align="center" style="padding-top:100px ;" >
            <form action="">
                <div style="padding: 15px;">
                    <label>Doctor Name: </label>
                    <input type="text" style="color: black;" name="name" placeholder="Write the Name" >
                </div>
                <div style="padding: 15px;">
                    <label>Phone Number: </label>
                    <input type="number" style="color: black;" name="number" placeholder="Write the Number" >
                </div>
                <div style="padding: 15px;">
                    <label>Speciality </label>
                    <select name="speciality" style="color:black ; width:200px; ">
                        <option value="skin">skin</option>
                        <option value="heart">heart</option>
                        <option value="eye">eye</option>
                        <option value="nose">nose</option>
                    </select>
                </div>
                <div style="padding: 15px;">
                    <label>Room No: </label>
                    <input type="number" style="color: black;" name="room" placeholder="Write the room number" >
                </div>

                <div style="padding: 15px;">
                    <label>Doctor Image: </label>
                    <input type="file" name="image">
                </div>
                <div style="padding: 15px;">
                <input type="submit" class="btn btn-success">
                </div>
            </form>

        </div>

    </div>

       
    
    @include('admin.script')
  </body>
</html>