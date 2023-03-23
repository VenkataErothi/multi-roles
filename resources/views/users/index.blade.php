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
         <div class="col-lg-12 margin-tb">
            <h2>User</h2>
            <a href="{{ route('users.create') }}"class="btn btn-success btn-sm" title="Add User">
               <i class="fa fa-plus" aria-hidden="true"></i>Add New</a>
         </div>
      </div>
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
         <p>{{ $message }}</p>
      </div>
      @endif
      <div class="card-body">
         <div class="mb-2">
            <form class="form-inline" action="">
               <label for="keyword">&nbsp;&nbsp;</label>
               <input type="search" name="search" id="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
            </form>
         </div>
         <table class="table table-bordered table-striped">
            <thead>
            <tr>
               <th>No</th>
               <th>Name</th>
               <th>Email</th>
               <th>Roles</th>
            </tr>
            </thead>
            <tbody class="searchResults">
               @foreach ($data as $user)
               <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name }}</td>
                  <td>{{$user->email }}</td>
                  <td>{{$user->role}}</td>
                  </td>                       
               </tr>
               @endforeach
            </tbody>
         </table>
         {{ $data->links() }} 
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
                        searchResults.append('<tr><td>'+result['id']+'</td><td>'+result['name']+'</td><td>'+result['email']+'</td><td>'+result['role']+'</td></tr>');
                     });
                  }
            });
      });
      
   </script>
      </body>
      </html>
