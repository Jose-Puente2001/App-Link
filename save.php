<?php require_once 'db.php'; ?>

<?php

if(isset($_POST['save_app'])){

	$name = $_POST['name'];
	$link = $_POST['url'];
	$user_id = $_SESSION['id'];
   

   $query = "INSERT INTO link(name, link, user_id) VALUES ('$name', '$link', '$user_id')";
   $result = mysqli_query($connection, $query);

   if(!result){
   	   die('fallied');
   }
   
   header("Location: home.php");
}