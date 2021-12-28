<?php

require_once 'db.php';

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$query = "SELECT * FROM link WHERE id=$id";
	$result = mysqli_query($connection, $query);

	if(mysqli_num_rows($result) == 1){

       $row = mysqli_fetch_array($result);
       $name = $row['name'];
       $link = $row['link'];
	}
}


	if(isset($_POST['update'])){
        $id = $_GET['id'];
		$name = $_POST['name'];
		$link = $_POST['url'];
		$query = "UPDATE link SET name = '$name', link = '$link' WHERE id=$id";
		mysqli_query($connection, $query);
		header("Location: home.php");

	}

?>


<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navigation.php'; ?>
<div class="container p-5">
    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post">
		<div class="mb-4">
		  <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="name" />
		</div>
		<div class="mb-4">
		 <input type="url" class="form-control" name="url" value="<?php echo $link; ?>" placeholder="url" />
		</div>
		<button  class="btn btn-primary" name="update">update</button>
	</form>
</div>
<?php require_once 'includes/footer.php'; ?>

