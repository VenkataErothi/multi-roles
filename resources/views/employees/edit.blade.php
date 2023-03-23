@include('sidebar')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
    </script> 
</head>
<body>
   
     <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Data was not updated</strong> <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
     @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     <div class="card-body">
    <form action="{{ route('employees.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
        
           @csrf
      
         <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    
                    <input type="hidden" name="id" value="{{ $employee['id'] }}" class="form-control" >
                </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <strong>EmployeeId:</strong>
                    <input type="text" name="employeeID" value="{{ $employee['employeeID'] }}" class="form-control" placeholder="Id">
                    @error('employeeID') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" value="{{ $employee['first_name'] }}" class="form-control" placeholder="Enter your first name">
                     @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
                <div class="col-md-6 mb-3">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter your last name" value="{{ $employee['last_name' ]}}">
                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
                <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="start">Start date:</label>
                    <input type="date" name="start_date" value="{{ \Carbon\Carbon::parse($employee->start_date)->format('Y-m-d') }}"  class="form-control" placeholder=" ">
                     @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <input type="text" name="skills" value="{{ $employee['skills'] }}" class="form-control" placeholder=" ">
                    <strong>Skills:</strong>
                    <select name="skills" id="skills">
                    <option value="php ">PHP </option>
                    <option value="react">React</option>
                    <option value="angular">Angular</option>
                    <option value="java">Java</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

