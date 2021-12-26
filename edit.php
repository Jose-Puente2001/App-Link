<?php

require_once 'db.php';

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$query = "SELECT * FROM link WHERE id = $id";
	$result = mysqli_query($connection, $query);

	if(mysqli_num_rows($result) == 1){

       $row = mysqli_fetch_array($result);
       $name = $row['name'];
       $link = $row['link'];
	}


	if(isset($_POST['update'])){

		$name = $_POST['name'];
		$link = $_POST['url'];
		$query = "UPDATE link set name = '$name' link = '$link' WHERE id = $id";
		mysqli_query($connection, $query);
		$_SESSION['message'] = "Note updated successfully";
	    $_SESSION['message_type'] = "warning";
		header("Location: home.php");

	}
}

?>


<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navigation.php'; ?>
<div>
	<form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
		<input type="text" name="name" value= "<?php echo $name ?>" placeholder="name" />
		<input type="url" name="url" value= "<?php echo $link ?>" placeholder="url" />
		<button name="update">update</button>
	</form>
</div>
<?php require_once 'includes/footer.php'; ?>

