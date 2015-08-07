<?php
include('../db.php');
	
	$q=$_GET['q'];
	$my_data=$q;
	$trip_id=$_GET['trip_id'];
	$count = 0;
	$sql=mysql_query("select d.driver_name,d.id as driver_id,c.id as cab_id, c.vehicle_reg from driver_reg d INNER JOIN cab_reg c on c.id=d.cab_id where (d.driver_name like '".$my_data."%' or c.vehicle_reg like '".$my_data."%') and c.status='1'");
	
	while($re=mysql_fetch_array($sql)){
		++$count;
		$driver_id=$re['driver_id'];
		
		$driver_name=$re['driver_name'];
		//$sql1=mysql_query("select * from cab_reg where status='1'");
		//if(mysql_num_rows($sql1)!=0){
		//while($arr=mysql_fetch_array($sql1)){
		$cab_id=$re['cab_id'];
		$cab_no=$re['vehicle_reg'];
		
		$sql2=mysql_query("select * from cab_drivers where cab_id='$cab_id' and driver_id='$driver_id' order by id desc");
		if(mysql_num_rows($sql2)!=0){
			$arr1=mysql_fetch_array($sql2);
			//echo $arr1['id']."\n";
		echo $driver_name." (".$cab_no.")"."\n";
		}
		//}
		//}
	}
		if(!$count)
		{
			echo "Drivers Not found";
		}
		?>
	
