<?php include('../db.php');
$mobile = $_POST['mobile'];
$sql=mysql_query("SELECT * from driver_reg where mobile='$mobile'");
$arr=mysql_fetch_array($sql);
echo $arr['driver_name'];
?>
