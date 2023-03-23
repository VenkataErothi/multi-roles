 @include('sidebar')
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
    .card-body{
          width: 30vw;
        margin-left: 75%;
    }
</style>
</head>
<body>
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('You are logged in!') }}
            </div>
                <div class="card-body">
                   @if(session()->get('name'))
                            {{session()->get('name')}}
                    @endif
                      <ul class="nav navbar-nav navbar-right">             
                                <li style="align-content:right">
                                    <a  href="{{ route('logout') }}" >Logout</a>
                                </li>
                            </ul>  
                    
                </div>
             </div>
        </div>
    </div>
</div>
  </body>
  </html>
 