<?php

require_once 'db.php';


if(isset($_POST['send'])){

$username = $_POST['name'];
$userpassword = $_POST['password'];

$query = "SELECT * FROM users where name='$username'";
$result = mysqli_query($connection, $query);
$num = mysqli_num_rows($result);

if($num == 1){

  while($row= mysqli_fetch_assoc($result)){
       
       if(password_verify($userpassword, $row['password'])){
       	     session_start();
       	     $_SESSION['loggedin'] = true;
             $_SESSION['username'] = $username;
       	     header("Location: home.php");
       }
    
    else{
  	 echo "error users";
  }
 
  }

 

}


}


?>



<?php require_once 'includes/header.php'; ?>
<div>
<h1>sign in</h1>
or<a href="signup.php">sign up</a>
<form action="login.php" method="post">
<input type="text" name="name" placeholder="Enter your name" />
<input type="password" name="password" placeholder="Enter your password" />
<input type="submit" name="send" />
</div>

<?php require_once 'includes/footer.php'; ?>