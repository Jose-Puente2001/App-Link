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
       	     $_SESSION['loggedin'] = true;
             $_SESSION['username'] = $username;
             $_SESSION['id'] = $row['id'];
       	     header("Location: home.php");
       }
    
    else{
     $_SESSION['login_message'] = "error users";
      $_SESSION['login_message_type'] = "danger";
  }
 
  }

 

}


}


?>



<?php require_once 'includes/header.php'; ?>
<div class="container">
<div class="row">
<div class="col">
<div class="text-center">
<h1>sign in</h1>
or <a href="signup.php">sign up</a>
<?php if (isset($_SESSION['login_message'])){ ?>
<div class="alert alert-<?= $_SESSION['login_message_type']; ?> alert-dismissible fade show" role="alert">
<?=$_SESSION['login_message'];?>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php session_unset(); } ?>
</div>
<form action="login.php"  method="post">
<div class="mb-4">
<label for="exampleInput1" class="form-label">Name</label>
<input type="text" class="form-control" name="name" placeholder="Enter your name" />
</div>
<div class="mb-4">
<label for="exampleInput2" class="form-label">Password</label>
<input type="password" class="form-control"  name="password" placeholder="Enter your password" />
</div>
<button class="btn btn-primary" name="send">sign in</button>
</form>
</div>
</div>
</div>

<?php require_once 'includes/footer.php'; ?>