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
<div>
	<h1>sign up</h1>
	or<a href="login.php">sign in</a>
	<form action="signup.php" method="post">
   <input type="text" name="name" placeholder="Enter your name" />
   <input type="password" name="password" placeholder="Enter your password" />
   <input type="password" name="confirm_password" placeholder="Cofirm your password" />
    <input type="submit" name="send" />
</div>

</div>
<?php require_once 'includes/footer.php'; ?>