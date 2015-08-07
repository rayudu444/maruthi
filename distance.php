<?php 
function get_driving_information($start, $finish, $raw = false)
{
	if(strcmp($start, $finish) == 0)
	{
		$time = 0;
		if($raw)
		{
			$time .= ' seconds';
		}
 
		return array('distance' => 0, 'time' => $time);
	}
 
	$start  = urlencode($start);
	$finish = urlencode($finish);
 
	$distance   = 'unknown';
	$time		= 'unknown';
 
	$url = 'http://maps.googleapis.com/maps/api/directions/xml?origin='.$start.'&destination='.$finish.'&sensor=false';
	if($data = file_get_contents($url))
	{
		$xml = new SimpleXMLElement($data);
 
		if(isset($xml->route->leg->duration->value) AND (int)$xml->route->leg->duration->value > 0)
		{
			if($raw)
			{
				$distance = (string)$xml->route->leg->distance->text;
				$time	  = (string)$xml->route->leg->duration->text;
			}
			else
			{
				$distance = (int)$xml->route->leg->distance->value / 1000 / 1.609344; 
				$time	  = (int)$xml->route->leg->duration->value;
			}
		}
		else
		{
			throw new Exception('Could not find that route');
		}
 
		return array('distance' => $distance, 'time' => $time);
	}
	else
	{
		throw new Exception('Could not resolve URL');
	}
}
try
{
	$info = get_driving_information('Khairatabad, Hyderabad, Telangana, India', 'Lingampally, Hyderabad, Telangana, India');
	$distance1=round($info['distance'] * 1.609344,1);
	$time1=round($info['time'] / 60);
	echo $distance1.' Kms '.$time1.' Minutes';
}
catch(Exception $e)
{
    echo 'Caught exception: '.$e->getMessage()."\n";
}
 
# Outputs 229.00 miles 14640 seconds
?>