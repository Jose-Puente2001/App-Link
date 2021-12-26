<?php


 require_once 'db.php'; 


  if(isset($_POST['send'])){

  	$name = $_POST['name'];
  	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "INSERT INTO users(name, password) VALUES ('$name', '$password')";
    $result = mysqli_query($connection, $query);
     header("Location: signup.php");
   
  	
  }

 ?>
<?php require_once 'includes/header.php'; ?>
<div class="container">
  <div class="row">
  <div class="col">
	<h1>sign up</h1>
	or<a href="login.php">sign in</a>
	<form action="signup.php" method="post">
   <div class="mb-4">
   <label for="name" class="form-label">Name</label>
   <input type="text" class="form-control" name="name" placeholder="Enter your name" />
   </div>
   <div class="mb-4">
   <label for="password" class="form-label">Password</label>
   <input type="password" class="form-control" name="password" placeholder="Enter your password" />
   </div>
    <input type="submit"  class="btn btn-primary" name="send" />
</div>
</div>
</div>
<?php require_once 'includes/footer.php'; ?>