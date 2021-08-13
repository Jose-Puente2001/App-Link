<?php require_once 'db.php' ?>

<?php require_once 'includes/header.php'; ?>
<main>
	<form action="save.php" method="POST">
		<input type="text" name="name" placeholder="name" />
		<input type="url" name="url" placeholder="url" />
		<input type="submit" name="save_app">
	</form>
</main>

<?php 

$query = "SELECT * FROM link";
$result = mysqli_query($connection, $query);

while($row = mysqli_fetch_array($result)){?>

      <h1><?php echo $row['name']?></h1>
      <a href="edit.php?id=<?php echo $row['id']?>">edit</a>
      <a href="delete.php?id=<?php echo $row['id']?>">delete</a>
      <h1><?php echo $row['link']?></h1>
<?php } ?>



<?php require_once 'includes/footer.php'; ?>