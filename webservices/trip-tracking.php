<?php
	include_once '../db.php';
	
	if(isset($_POST['trip_id']) && $_POST['trip_id'] != '' && isset($_POST['status']) && $_POST['status'] != '')
	{
		$result = array();
		extract($_POST);
		
		$sql = "UPDATE `trip_reg` SET status = $status WHERE id = $trip_id";
		$statement = $dbh->prepare($sql);
$statement->execute();
		if($statement->rowCount())
		{		
			$result['status'] = 'success';
			echo json_encode($result);
		}else{
			$result['status'] = 'failed';
			echo json_encode($result);
		}
	}