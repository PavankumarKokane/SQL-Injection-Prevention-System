<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>SQL Injection Prevention</title>
	<link rel="stylesheet" type="text/css" href="/css/stylesearch.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="/js/validation.js"></script>  
  </head>
<body>
<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<center><p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p></center></br>
    	<center><p><button class="btn"><a href="index.php?logout='1'" style="color: white;text-decoration:none">Logout</a></button></p></center>
    <?php endif ?>
</div>
<form method="GET" action="index.php">
  	<div class="input-group">
  		<label>Search Bar</label>
  		<input type="text" name="search" id="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data"></br>
		<span id="lblError" style="color: red"></span><br>
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn">Search</button>
  	</div>
      <center>
      <table>
                            <thead>
                            <center><span id="lblError" style="color: red"></span></center><br>
                                <tr>
                                    <th>ID</th>
                                    <th>Categories</th>
                                    <th>Product_name</th>
                                    <th>Prize</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","registration");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = stripcslashes($search);
                                        $filtervalues = mysqli_real_escape_string($con, $_GET['search']);
                                        
                                       $query = "SELECT * FROM product WHERE CONCAT(Categories,product_name,prize) LIKE '%$filtervalues%' ";
                
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['id']; ?></td>
                                                    <td><?= $items['Categories']; ?></td>
                                                    <td><?= $items['product_name']; ?></td>
                                                    <td><?= $items['prize']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        /*else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }*/

                                        $query = "SELECT * FROM product1 WHERE CONCAT(Categories,product_name,prize) LIKE '%$filtervalues%' ";
                
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['id']; ?></td>
                                                    <td><?= $items['Categories']; ?></td>
                                                    <td><?= $items['product_name']; ?></td>
                                                    <td><?= $items['prize']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        /*else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }*/
                                        


                                    }
                                    
                                ?>
                            </tbody>
                            
                        </table>
                                </center>
  </form>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>		
</body>
</html>