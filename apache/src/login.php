<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Social Hub - Login</title>
    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <div class="card mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <form name="form" method="post" action="login_action.php">
          <div class="form-group">
          <label>Email:</label> 
          <input class="form-control" aria-describedby="emailHelp" type="text" name="email" placeholder="Enter email" />
          <br />
          <label>Password:</label> 
          <input class="form-control" type="password" name="password1" placeholder="Enter passowrd" />
          <br />
          <input class="btn btn-primary btn-block" type="submit" name="button" value="Login" /></div>
        </form>
        <div class="text-center">
        <a class="d-block small mt-3" href="register.php">Register an Account</a> 
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</html>
