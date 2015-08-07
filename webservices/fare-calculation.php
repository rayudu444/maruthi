<?php
	include_once '../db.php';
	include_once 'includes/validation.php';
	
	$parameters = array('trip_id','driver_id','wait_time','ride_time','coordinates','status');
	$result = array();
	$is_parameters_exists = is_post_parameters_exists($parameters);
	
	if(!$is_parameters_exists)
	{
		extract($_POST);
		
		
		$extra_fare = 0;
		//getting trip details
		$sql = "SELECT * FROM trip_reg WHERE id = $trip_id";
		$statement = $dbh->prepare($sql);
		$statement->execute();
		$trip_details = $statement->fetch(PDO::FETCH_ASSOC);
		
		$car_type = $trip_details['cartype'];
		$package = $trip_details['package'];
		
		//getting package details
		$sql = "SELECT * FROM fare_chart WHERE category = '$package' and cartype = '$car_type'";
		$statement = $dbh->prepare($sql);
		$statement->execute();
		$package_details = $statement->fetch(PDO::FETCH_ASSOC);
		
		//minimum fare 
		$minimum_fare = $package_details['min_bill'];
		
		//calculating  distance travelled
		$total_distance = getdistance($coordinates);
		
		if($total_distance > $package_details['min_kms'])
		{
			$extra_distance_travelled = $total_distance - $package_details['min_kms'];
			
			$extra_fare = $extra_distance_travelled * $package_details['extra_kms'];
			
		}
		//converting minutes to seconds
		$free_waiting_seconds = $package_details['free_waiting_mins'] * 60;
		$free_ride_seconds = $package_details['free_ride_mins'] * 60;
		
		//calculating waiting fare
		$wait_time_fare = ($free_waiting_seconds > $wait_time)? 0 : (($wait_time - $free_waiting_seconds)/60) * $package_details['waiting_charges'];
		$wait_time_fare = round($wait_time_fare,2);
		
		
		//calculating ride time fare
		$ride_time_fare = ($free_ride_seconds > $ride_time)? 0 : (($ride_time - $free_ride_seconds)/60) * $package_details['ride_charges'];
		$ride_time_fare = round($ride_time_fare,2);
		 
		/*echo "min fare $minimum_fare<br/>";
		echo "wait time fare $wait_time_fare<br/>";
		echo "ride time fare $ride_time_fare<br/>";*/
		$total_fare = $minimum_fare + $wait_time_fare + $ride_time_fare;
		
		//inserting completed trip details 
		$sql = "UPDATE trip_reg SET status = $status WHERE id = $trip_id";
		$statement = $dbh->prepare($sql);
		$statement->execute();
		
		
		//inserting completed trip details 
		$sql = "INSERT INTO completed_trip_details SET `trip_id` = $trip_id,`min_fare` = $minimum_fare,`wait_time_fare` = $wait_time_fare,`ride_time_fare` = $ride_time_fare,`total_fare` = $total_fare,`travelled_distance` = $total_distance";
            
		$statement = $dbh->prepare($sql);
		$statement->execute();
		
		
		//changing driver status
		$sql = "UPDATE driver_reg SET driver_availability=1 WHERE id = $driver_id";
		$statement = $dbh->prepare($sql);
		$statement->execute();
		
		
			$result['status'] = 'success';
			$result['fare'] = $total_fare;
			$result['travelled_distance'] = $total_distance;
			echo json_encode($result);	
		
		
	}else{
		$result['status'] = 'failed';
		$result['message'] = 'Mandatory fields required';
		$result['errCode'] = 1;
		echo json_encode($result);
	}
	
	//calculates total distance by given coordinates array
	function getdistance($coordinates)
	{
		$total_distance = 0;
		$headers = array('Content-Type: application/json');
		$origin = array_shift($coordinates);//getting starting points
		$destination = array_pop($coordinates);//getting ending points
		
		if(count($coordinates) > 0)
		{
			$waypoints = implode("|",$coordinates); //getting waypoints
			//optimized  travelled distance
			//http://maps.googleapis.com/maps/api/directions/json?origin=16.4333,81.6833&destination=16.5333,81.5333&waypoints=optimize:true|Barossa+Valley,SA|Clare,SA|Connawarra,SA|McLaren+Vale,SA&key=AIzaSyC0YR23V4eGXrmci7Q0zP3dwaOqguXPZ2g
			
			$url = "https://maps.googleapis.com/maps/api/directions/json?origin=$origin&destination=$destination&waypoints=$waypoints&key=AIzaSyC0YR23V4eGXrmci7Q0zP3dwaOqguXPZ2g";
		}else{
			$url = "https://maps.googleapis.com/maps/api/directions/json?origin=$origin&destination=$destination&key=AIzaSyC0YR23V4eGXrmci7Q0zP3dwaOqguXPZ2g";
		}
		
		$ch = curl_init();
		// Set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		
		$result = json_decode(curl_exec($ch));
		
		$distances = $result->routes[0]->legs;
		foreach ($distances as $distance) {

			$total_distance += $distance->distance->value;
		}
		return number_format($total_distance/1000,1,'.','');
	}