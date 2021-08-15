<?php

require_once 'db.php';

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$query = "DELETE FROM link WHERE id = $id";
	$result = mysqli_query($connection, $query);
     
    $_SESSION['message'] = "Note removed successfully";
    $_SESSION['message_type'] = "danger";

	header("Location: index.php");
}