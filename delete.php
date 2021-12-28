<?php

require_once 'db.php';

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$query = "DELETE FROM link WHERE id = $id";
	$result = mysqli_query($connection, $query);
	header("Location: home.php");
}