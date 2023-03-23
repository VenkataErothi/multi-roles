@include('sidebar')
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Authentication</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
   </head>
   <body>
      <div class="container">
      <div class="row">
         <div class="col-lg-12 margin-tb">
            <h2>Employees</h2>
            <a href="{{route('employees.create')}}"class="btn btn-success btn-sm" title="Add Employee">
            <i class="fa fa-plus" aria-hidden="true"></i>Add New</a>
         </div>
         @if ($message = Session::get('success'))
         <div class="alert alert-success">
            <p>{{ $message }}</p>
         </div>
         @endif
         <div class="card-body">           
            <div class="mb-2">
               <form class="form-inline">
                  <label for="keyword">&nbsp;&nbsp;</label>
                  <input type="search" name="search" id="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
               </form>
            </div>
            <table class="table table-bordered table-striped">
               <thead>
               <tr>
                  <th>No</th>
                  <th>EmployeeId</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Start date</th>
                  <th>Skills</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th >Action</th>
               </tr>   
            </thead>
             <tbody class="searchResults">
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
                  <td>
                     <a class="btn btn-info" href="{{'show/'.$employee->id}}">View</a>
                     <a class="btn btn-primary" href="{{'edit/'.$employee->id}}">Edit</a>
                  </td>
               </tr>
               @endforeach
            </tbody> 
            </table>
            <span>
            {{ $employees->links() }} 
            </span>
         </div>
      </div>
      <style >
         .w-5{
         display: none;
         }
      </style>
      <script type="text/javascript">
      $('#search').on('keyup',function(){
            var search = $('#search');
               event.preventDefault();
               $.ajax({
                  url:'/search',
                  type : 'GET',
                  data:search.serialize(),
                  success:function(data){
                     console.log(data);
                     var searchResults = $('.searchResults');
                     searchResults.empty();
                     $.each(data,function(index,result){
                        console.log(result['id'])
                        searchResults.append('<tr><td>'+result['id']+'</td><td>'+result['employeeID']+'</td><td>'+result['first_name']+'</td><td>'+result['last_name']+'</td><td'+result['start_date']+'</td><td>'+result['skills']+'</td><td>'+result['created_at']+'</td><td>'+result['updated_at']+'</td><td><a class="btn btn-info" href="{{url('show/'.$employee->id)}}">View</a><a class="btn btn-primary" href="{{url('edit/'.$employee->id)}}">Edit</a></td></tr>');
                     });
                  }
            });
      });
      
   </script>
      </body>
      </html>

           
