<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>SQL Injection Prevention</title>
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="/js/validation.js"></script>  
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" id="username" >
		<span id="lblError" style="color: red"></span><br>
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" id="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>