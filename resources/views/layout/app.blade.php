<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row my-2">
      <div class="col-lg-12 d-flex justify-content-between align-items-center mx-auto">
        <div>
          <h2 class="text-primary">DogBook</h2>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
        <div>
        <?php
        if(Session::has('loginID'))
        {?>
          <a href="@yield('profileLink')" class="btn btn-primary rounded-pill me-2">@yield('profile_text')</a>
          <a href="@yield('link')" class="btn btn-primary rounded-pill me-2">@yield('link_text')</a>
          <?php } 
          else 
          { ?>
            <a href="registration" class="btn btn-primary rounded-pill me-2">Register</a>
          <?php } ?>
        </div>
        <?php
        if(Session::has('loginID'))
        {?>
          <a href="@yield('logoutLink')" class="btn btn-primary rounded-pill">@yield('logout_text')</a>
          <?php }
           else 
           { ?>
          <a href="login" class="btn btn-primary rounded-pill">Login</a>
          <?php } 
        ?>
       
        </nav>
      </div>
    </div>
    <hr class="my-2">

    @yield('content')

  </div>
  
  @yield('scripts')
</body>

</html>