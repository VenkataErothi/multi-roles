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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

    <!--  <div class="container">
     	<div class="row"> -->
     		<div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
     			<h4>Login</h4>
                @error('failed')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
     			<form action="{{route('login-user')}}" method="post">
     				@if ($message = Session::get('success'))
                   <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                    @endif

                    @if ($message = Session::get('fail'))
                   <div class="alert alert-success">
                   <p>{{ $message }}</p>
                   </div>
                    @endif
     				
     				@csrf
     				<div class="form-group">
     					<label for="email">Email</label>
     					<input type="text" class="form-control" placeholder="Enter Email" name="email" value="">
     					@error('email') <span class="text-danger">{{ $message }}</span> @enderror
     					
     				</div>
     				<div class="form-group">
     					<label for="password">Password</label>
     					<input type="password" class="form-control" placeholder="Enter password" name="password" value="">
     					@error('password') <span class="text-danger">{{ $message }}</span> @enderror
     					
     				</div>
     				<div class="form-group">
     					<button class="btn btn-block btn-primary" type="submit">Login</button>
     				</div>
     				<br>
     				<a href="registeration">New User !! Register here</a>
     			</form>
     		</div>
     	</div>
     </div>
</div>
</div>
</body>
</html>