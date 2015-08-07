<?php
	
	if(isset($_POST['coordinates']))
	{

		$coordinates = $_POST['coordinates'];
		$headers = array('Content-Type: application/json');
		$origin = array_shift($coordinates);//getting starting points
		$destination = array_pop($coordinates);//getting ending points
		$waypoints = implode("|",$coordinates); //getting waypoints
		$total_distance = 0;
		//optimized  travelled distance
		//http://maps.googleapis.com/maps/api/directions/json?origin=16.4333,81.6833&destination=16.5333,81.5333&waypoints=optimize:true|Barossa+Valley,SA|Clare,SA|Connawarra,SA|McLaren+Vale,SA&key=AIzaSyC0YR23V4eGXrmci7Q0zP3dwaOqguXPZ2g
		//non optimized travelled distance
		//$url = "https://maps.googleapis.com/maps/api/directions/json?origin=17.416690,78.464665&destination=17.401390,78.559422&waypoints=17.413511,78.471016|17.401063,78.487496|17.395657,78.503632|17.391725,78.513417&key=AIzaSyC0YR23V4eGXrmci7Q0zP3dwaOqguXPZ2g";
		$url = "https://maps.googleapis.com/maps/api/directions/json?origin=$origin&destination=$destination&waypoints=$waypoints&key=AIzaSyC0YR23V4eGXrmci7Q0zP3dwaOqguXPZ2g";
		$ch = curl_init();
		
		// Set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$result = json_decode(curl_exec($ch));
		//echo "<pre>";
		//print_r($result);exit();
		$distances = $result->routes[0]->legs;
		foreach ($distances as $distance) {

			$total_distance += $distance->distance->value;
		}
	  	echo json_encode(array('status'=>'success','distance' => number_format($total_distance/1000,1,'.','')));
	}else{
		echo json_encode(array('status'=>'failed'));
	}

?>