<?php

include('../db.php');

	$q=$_GET['q'];

	$my_data=$q;

	$trip_id=$_GET['trip_id'];

	$sql=mysql_query("select * from driver_reg where driver_name like '".$my_data."%'");

	while($re=mysql_fetch_array($sql)){

		$driver_id=$re['id'];

		$driver_name=$re['driver_name'];

		$sql1=mysql_query("select * from cab_reg where status='1'");

		if(mysql_num_rows($sql1)!=0){

		while($arr=mysql_fetch_array($sql1)){

		$cab_id=$arr['id'];

		$cab_no=$arr['vehicle_reg'];

		$sql2=mysql_query("select * from cab_drivers where cab_id='$cab_id' and driver_id='$driver_id' order by id desc");

		if(mysql_num_rows($sql2)!=0){

			$arr1=mysql_fetch_array($sql2);

			//echo $arr1['id']."\n";

		echo $driver_name." (".$cab_no.")"."\n";

		}

		}

		}

	}

		?>

	

