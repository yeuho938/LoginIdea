<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    .box{
      width: 500px;
    }
  </style>
</head>
<body>
  <center>
    <h1 style="color: red;"> REGISTER </h1>
    <div class="box">
      <form class="form" method="POST" action="/auth/register" enctype="multipart/form-data">
       @csrf
       <div class="form-group">
        <label for="name" style="float: left; font-size: 18px;"> Name</label>
        <input type="text" class="form-control" name = "name" placeholder="Enter name">
      </div>
      <div class="form-group">
        <label for="username" style="float: left; font-size: 18px;"> Username</label>
        <input type="text" class="form-control" name = "username" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="password" style="float: left; font-size: 18px;"> Password</label>
        <input type="password" class="form-control" name = "password" placeholder="Enter password">
      </div>
      <div class="form-group">
        <label for="phone" style="float: left; font-size: 18px;"> Phone</label>
        <input type="text" class="form-control" name = "phone" placeholder="Enter phone">
      </div>
      <div class="form-group">
        <label for="email" style="float: left; font-size: 18px;"> Email</label>
        <input type="text" class="form-control" name = "email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="role" style="float: left; font-size: 18px;"> Role</label>
        <input type="text" class="form-control" name = "role" placeholder="role">
      </div>
      <button type="submit" class="btn btn-default" style=" font-size: 18px; color:green ;"> Register</button>
    </form>
  </div>
</center>
</body>
</html>
