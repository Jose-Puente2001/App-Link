<?php require_once 'db.php'; ?>

<?php
ob_start();
?>


<!DOCTYPE html>
<html>
<head>
  <title>document</title>
</head>
<body>
<table>
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Link</th>
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