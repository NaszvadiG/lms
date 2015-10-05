<?php session_start(); ?>
<?php if(!isset($_SESSION['admin_id'])){header("Location: login.php");} ?>
<?php
/*determines the directory*/
$imagetarget = "uploads/";

$imagetarget = $imagetarget . uniqid() .basename($_FILES['image']['name']);

include('connect.php');

$con=mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("can not select DB");

$query = "INSERT INTO gallery (image) VALUES ('$imagetarget')";


$dbselect = mysql_query($query) or die('Query "' . $query . '" failed: ' . mysql_error());     

$title = $_POST['title'];
$comment = $_POST['comment'];
$imagecopy = $imagetarget;//Copies the image key and places it into repairs so both tables can share the same image.

$query2 = "INSERT INTO repairs (title, comment,image2) VALUES ('$title' , '$comment','$imagecopy')";
$dbselect = mysql_query($query2) or die('Query "' . $query2 . '" failed: ' . mysql_error());

if(move_uploaded_file($_FILES['image']['tmp_name'], $imagetarget))

{ 
echo "<meta http-equiv='refresh' content='0;url=http://www.hillviewpcrepair.com/repairs.php' >";
}
else 
{
echo "Sorry, there was a problem uploading your file.";
} 
?>