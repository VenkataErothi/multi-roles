@include('sidebar')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
     <div class="container">
    <div class="row">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>EmployeeId</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Start date</th>
            <th>Skills</th>
            <th>Created At</th>
            <th>Updated At</th>
            
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->employeeID }}</td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->start_date }}</td>
            <td>{{ $employee->skills }}</td>
            <td>{{ $employee->created_at }}</td>
            <td>{{ $employee->updated_at }}</td>

            
        </tr> 
        @endforeach 
    </table>
      {{ $employees->links() }} 
    </div>
</div>
<div> 
</div>      
</body>
</html>
