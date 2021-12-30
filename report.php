<?php require_once 'db.php'; ?>

<?php
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php 

$idusers = $_SESSION['id'];
$query = "SELECT id, name FROM users WHERE id='$idusers'";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result)): ?>

<h1>User: <?php echo $row['name']; ?> </h1>

<?php endwhile; ?>


<table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Link</th>
          </tr>
        </thead>
     <tbody>
<?php

$user_id = $_SESSION['id'];
$query = "SELECT * FROM link WHERE user_id='$user_id'";
$result = mysqli_query($connection, $query);

while($row = mysqli_fetch_array($result)):?>
          <tr>
            <th><?php echo $row['name']?></th>
             <th><a href="<?php echo $row['link']?>" target="_blank"><?php echo $row['link']?></a></th>
          </tr>
<?php endwhile; ?>
  </tbody>
 </table>
</body>
</html>

<?php

$html = ob_get_clean();

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(utf8_decode($html));
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("document.pdf", array("Attachment" => false));


 ?>
