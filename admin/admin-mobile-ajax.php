<?php include('../db.php');
$mobile = $_POST['mobile'];
$sql=mysql_query("SELECT * from registration where mobile='$mobile'");
$arr=mysql_fetch_array($sql);
echo $arr['name'];
?>
