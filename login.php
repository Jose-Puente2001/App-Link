<?php

require_once 'db.php';


if(!empty($name) && !empty($_POST['password'])){
  
  $query = "SELECT * FROM users";
  $result = mysqli_query($connection, $query);
  $array = mysqli_fetch_array($result);


   if($array['contar'] > 0){
   	 header("Location: home.php");
   }

   else{
   	 echo 'error users';
   }
}


?>



<?php require_once 'includes/header.php'; ?>
<div>
<h1>Login</h1>
or<a href="signup.php">Signup</a>
<form action="login.php" method="post">
<input type="text" name="name" placeholder="Enter your name" />
<input type="password" name="password" placeholder="Enter your password" />
<input type="submit" name="send" />
</div>

<?php require_once 'includes/footer.php'; ?>