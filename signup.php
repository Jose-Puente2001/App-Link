<?php


 require_once 'db.php'; 


  if(isset($_POST['send'])){

  	$name = $_POST['name'];
  	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "INSERT INTO users(name, password) VALUES ('$name', '$password')";
    $result = mysqli_query($connection, $query);
    $_SESSION['signup_message'] = "user created successfully";
    $_SESSION['signup_message_type'] = "success";
    header("Location: signup.php");
     
  }

 ?>
<?php require_once 'includes/header.php'; ?>
<div class="container">
<div class="row">
<div class="col">
<div class="text-center">
<h1>sign up</h1>
  or <a href="login.php">sign in</a>
 <?php if(isset($_SESSION['signup_message'])) { ?>
 <div class="alert alert-<?= $_SESSION['signup_message_type']; ?> alert-dismissible fade show" role="alert">
<?=$_SESSION['signup_message'];?>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php session_unset(); } ?>  
</div>
<form action="signup.php" method="post">
<div class="mb-4">
   <label for="name" class="form-label">Name</label>
   <input type="text" class="form-control" name="name" placeholder="Enter your name" />
   </div>
   <div class="mb-4">
   <label for="password" class="form-label">Password</label>
   <input type="password" class="form-control" name="password" placeholder="Enter your password" />
   </div>
    <button class="btn btn-primary" name="send" />Join Weblink</button>
</form>
</div>
</div>
</div>
<?php require_once 'includes/footer.php'; ?>