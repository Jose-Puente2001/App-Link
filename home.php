<?php require_once 'db.php'; ?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navigation.php'; ?>
<main class="container p-4">
<?php if (isset($_SESSION['message'])){ ?>
<div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
  <?= $_SESSION['message']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php session_unset(); } ?>
<div class="text-center">
	<form action="save.php" method="POST">
		<input type="text" name="name" placeholder="name" />
		<input type="url" name="url" placeholder="url" />
		<button class="btn btn-danger" name="save_app">Add Link</button>
	</form>
</div>
</main>
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
<?php 

$query = "SELECT * FROM link";
$result = mysqli_query($connection, $query);

while($row = mysqli_fetch_array($result)){?>
      		<tr>
      			<th><?php echo $row['name']?></th>
      			<th><a href="<?php echo $row['link']?>" target="_blank"><?php echo $row['link']?></a></th>
      			<th><a href="edit.php?id=<?php echo $row['id']?>"><i class="fas fa-edit"></i></a></th>
      			<th><a href="delete.php?id=<?php echo $row['id']?>"><i class="fas fa-trash-alt"></i></a></th>
      		</tr>
<?php } ?>
 	</tbody>
 </table>



<?php require_once 'includes/footer.php'; ?>