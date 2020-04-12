<?php
/**
 * Returns the list of details.
 */
require 'database.php';

$details = [];

if (false !== stripos($_SERVER['HTTP_REFERER'], "artist")){
	$sql = "SELECT id, name FROM artist";
	if($result = mysqli_query($con,$sql))
	{
	  $i = 0;
	  while($row = mysqli_fetch_assoc($result))
	  {
		$details[$i]['id']    = $row['id'];
		$details[$i]['name'] = $row['name'];
		$details[$i]['amount'] = $row['name'];
		$i++;
	  }

	  echo json_encode($details);
	}
	else
	{
	  http_response_code(404);
	}
} else if(false !== stripos($_SERVER['HTTP_REFERER'], "album")) {
		$sql = "SELECT id, name, date FROM album";
	if($result = mysqli_query($con,$sql))
	{
	  $i = 0;
	  while($row = mysqli_fetch_assoc($result))
	  {
		$details[$i]['id']    = $row['id'];
		$details[$i]['name'] = $row['name'];
		$details[$i]['date'] = $row['date'];
		$i++;
	  }

	  echo json_encode($details);
	}
	else
	{
	  http_response_code(404);
	}

} else if(false !== stripos($_SERVER['HTTP_REFERER'], "song")){
		$sql = "SELECT id, name, length FROM song";
	if($result = mysqli_query($con,$sql))
	{
	  $i = 0;
	  while($row = mysqli_fetch_assoc($result))
	  {
		$details[$i]['id']    = $row['id'];
		$details[$i]['name'] = $row['name'];
		$details[$i]['length'] = $row['length'];
		$i++;
	  }

	  echo json_encode($details);
	}
	else
	{
	  http_response_code(404);
	}

}	