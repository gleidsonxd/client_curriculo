<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/styleLogin.css">

  
</head>

<body>
    <div class="wrapper">
    <form class="form-signin" action="\userlogin" method="POST">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      {{-- <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me --}}
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
      <a href="\usuarioForm">Register</a>
    </form>
     
  </div>
  
  
</body>
</html>
