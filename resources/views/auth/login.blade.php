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
    <h1 style="color: red;"> LOGIN </h1>
    <div class="box">
      <form class="form" method="POST" action="/auth/login" enctype="multipart/form-data">
       @csrf
       <div class="form-group">
        <label for="name" style="float: left; font-size: 18px;"> Username</label>
        <input type="text" class="form-control" name = "username">
      </div>
      <div class="form-group">
        <label for="password" style="float: left; font-size: 18px;"> Password</label>
        <input type="password" class="form-control" name = "password">
      </div>
      <p style="color: red"> {{ Request::get('error')}}</p>
      <button type="submit" class="btn btn-default" style=" font-size: 18px; color:green ;"> Login</button>
    </form>
  </div>
</center>
</body>
</html>
