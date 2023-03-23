@include('dashboard')
    
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
     		<div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
     			<h4>Welcome to Dashboard</h4>
     			<form action="{{route('logout')}}" >
     				
     			
     				<div class="form-group">
     					<button class="btn btn-block btn-primary" type="submit">Logout</button>
     				</div>
     				
     			</form>
     		</div>
     	</div>
     </div>
</body>
</html>