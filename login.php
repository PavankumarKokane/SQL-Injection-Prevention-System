<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>SQL Injection Prevention</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript">
    $(function () {
        $("#username").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#lblError").html("");
 
            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^[A-Za-z]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lblError").html("Only Alphabets allowed.");				
				var alerted = localStorage.getItem('alerted') || '';
    				if (alerted != 'yes') {
    					 alert("Only Alphabets allowed.");
     					localStorage.setItem('alerted','yes');
   					 }
            }
 
            return isValid;
        });
    });
</script>
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