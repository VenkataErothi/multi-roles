<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script> 
</head>
<body>
     @include('sidebar')
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Employee
                      <a href="{{route('employees.index')}}"class="btn btn-primary btn-sm float-end">Back</a>
                    </h3>
                    @if ($message = Session::get('success'))
                   <div class="alert alert-success">
                   <p>{{ $message }}</p>
                 </div>
                @endif
                </div>
                <div class="card-body">
                    <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
         <div class="row">
            <div class="col-md-6 mb-3">
                    <label>EmployeeId:</label>
                    <input type="text" name="employeeID"  class="form-control" placeholder="Id">
                     @error('employeeID') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            <div class="col-md-6 mb-3">
                    <label>First Name:</label>
                    <input type="text" name="first_name" class="form-control" placeholder="Enter your first name">
                     @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
                <div class="col-md-6 mb-3">
                    <label>Last Name:</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter your last name" >
                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="start">Start date:</label>
                    <input type="date" name="start_date" class="form-control" placeholder=" ">
                    @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
               
                <input type="text" name="skills" class="form-control" placeholder=" ">
                    
                    <label for="skills">Choose a skill:</label>
                    <select name="skills" id="skills">
                    <option value="php developer">PHP Developer</option>
                    <option value="react">React</option>
                    <option value="angular">Angular</option>
                    <option value="java">Java</option>
                    </select>
            </div>
            <div class="col-md-6 mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>

