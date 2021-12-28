<?php require_once 'db.php'; ?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navigation.php'; ?>

<main class="container p-4">
  <div class="text-center">
   <?php 

   $idusers = $_SESSION['id'];
   $query = "SELECT id, name FROM users WHERE id='$idusers'";
   $result = mysqli_query($connection, $query);
    while($row= mysqli_fetch_array($result)):?>
      <h1>Welcome <?php echo $row['name']; ?></h1>
    <?php endwhile; ?>

    <form action="save.php" method="POST">
    <div class="mb-4">
    <input type="text" class="form-control" name="name" placeholder="name" />
   </div>
   <div class="mb-4">
    <input type="url" class="form-control" name="url" placeholder="url" />
    </div>
    <button class="btn btn-danger" name="save_app">Add Link</button>
  </form>
</div>
</main>
<div class="table-responsive-sm p-4">
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

while($row = mysqli_fetch_array($result)):?>
          <tr>
            <th><?php echo $row['name']?></th>
            <th><a href="<?php echo $row['link']?>" target="_blank"><?php echo $row['link']?></a></th>
            <th><a href="edit.php?id=<?php echo $row['id']?>"><i class="fas fa-edit"></i></a></th>
            <th><a href="delete.php?id=<?php echo $row['id']?>"><i class="fas fa-trash-alt"></i></a></th>
          </tr>
<?php endwhile; ?>
  </tbody>
 </table>
</div>
</main>
<?php require_once 'includes/footer.php'; ?>