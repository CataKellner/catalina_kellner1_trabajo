<?php
if(isset($_POST['add']))
{
$dbhost = '';
$dbuser = '';
$dbpass = '';
$db_name = 'upgrade';
$tbl_name = 'Testimonials';
$ftp_user = '';
$ftp_pass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("$db_name")or die("cannot select DB");


$ftp_server = "";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
// login with username and password
$login_result = ftp_login($ftp_conn, $ftp_user, $ftp_pass);


// check connection
if ((!$ftp_conn) || (!$login_result)) {
       echo "FTP connection has failed!";
       echo "Attempted to connect to $ftp_server for user $ftp_user";
       exit;
   } else {
       echo "Connected to $ftp_server, for user $ftp_user";
 }


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
}



?>