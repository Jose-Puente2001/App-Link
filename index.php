<?php require_once 'db.php'; ?>

<?php require_once 'includes/header.php'; ?>
<main "container p-4">
<?php if (isset($_SESSION['message'])){ ?>
<div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
  <?= $_SESSION['message']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php session_unset(); } ?>

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
    <table class="table table-bordered table-hover">
      	<thead>
      		<tr>
      			<th scope="col">Name</th>
      			<th scope="col">Link</th>
      			<th scope="col">Edit</th>
      			<th scope="col">Delete</th>
      		</tr>
      	</thead>
      	<tbody>
      		<tr>
      			<th><?php echo $row['name']?></th>
      			<th><a href="<?php echo $row['link']?>" target="_blank"><?php echo $row['link']?></a></th>
      			<th><a href="edit.php?id=<?php echo $row['id']?>">edit</a></th>
      			<th><a href="delete.php?id=<?php echo $row['id']?>">delete</a></th>
      		</tr>
      	</tbody>
      </table>
<?php } ?>



<?php require_once 'includes/footer.php'; ?>