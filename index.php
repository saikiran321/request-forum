<!DOCTYPE html>
<html>
<head>
  <title>Request Forum</title>
  <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container" id="wrapper">
  <div class="row">
  <div class="col-md-4 col-md-offset-4">
    <form method="POST" action="login.php">
      <div class="input-group">
          <span class="input-group-addon glyphicon glyphicon-user"></span>
          <input type="text" class="form-control" placeholder="Username" name="roll">
      </div>
      <div class="input-group">
          <span class="input-group-addon glyphicon glyphicon-lock"></span>
          <input type="password" class="form-control" placeholder="Password" name="pass">
      </div>
      <input type="hidden">
      <input type="submit" class="btn btn-primary btn-block" value="login">
    </form>
  </div>
  </div>
</div>
</body>
</html>
