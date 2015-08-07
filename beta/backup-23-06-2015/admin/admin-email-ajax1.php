<?php include('../db.php');
$email = $_POST['email'];
$sql=mysql_query("SELECT * from registration where email='$email'");
$arr=mysql_fetch_array($sql);
echo $arr['name'];
?>
