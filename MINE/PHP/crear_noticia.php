<?php
include ("bd.php");

if(isset($_POST['add']))
{
    echo "button create new workin";
 }

 $db_name = 'upgrade';
 $tbl_name = 'Testimonials';

$Fname = $_POST['fname'];
$Email = $_POST['email'];
$Content = $_POST['content'];
$filePath="http://www.mywebsite.com/testimonials/upload/" . $_FILES["file"]["name"];
$Type = $_POST['type'];

 if ($_FILES["file"]["error"] > 0)
  {
     echo "Error: NO CHOSEN FILE <br />";
     echo"INSERT TO DATABASE FAILED";
   }
   else
   {
     move_uploaded_file($_FILES["file"]["tmp_name"], __DIR__ . "/upload/" . $_FILES["file"]["name"]);
     echo"SAVED<br>";



  $query_image = "INSERT INTO $tbl_name (fname, email, content, image,type, submission_date) VALUES ('$Fname','$Email','$Content','$filePath','$Type',curdate())";
  if(mysql_query($query_image))
  {
    echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
  }
  else
  {
    echo 'File name not stored in database';
  }
}



?>