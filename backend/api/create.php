<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
print_r($request);
  if ($request->artist) {
	  // Validate.
	  if(trim($request->name) === '')
	  {
		return http_response_code(400);
	  }
	  // Sanitize.
	  $name = mysqli_real_escape_string($con, trim($request->name));
	  // Create.
	  $sql = "INSERT INTO `artist`(`name`) VALUES ('{$name}')";
	  if(mysqli_query($con,$sql))
	  {
		http_response_code(201);
		$detail = [
		  'name' => $name,
		  'id'    => mysqli_insert_id($con)
		];
		echo json_encode($detail);
	  }
	  else
	  {
		http_response_code(422);
	  }
  } else if($request->album){
	  // Extract the data.
	  $request = json_decode($postdata);
	  print_r($request);
	  // Validate.
	  if(trim($request->name) === '')
	  {
		return http_response_code(400);
	  }
	  // Sanitize.
	  $name = mysqli_real_escape_string($con, trim($request->name));
	  // Create.
	  $sql = "INSERT INTO `album`(`artist_id`, `name`, `date`) VALUES (2, '{$name}', now())";
	  print $sql;
	  if(mysqli_query($con,$sql))
	  {
		http_response_code(201);
		$detail = [
		  'name' => $name,
		  'date' => $request->date,
		  'id'    => mysqli_insert_id($con)
		];
		echo json_encode($detail);
	  }
	  else
	  {
		http_response_code(422);
	  }
  }else if($request->song) {
	  // Extract the data.
	  $request = json_decode($postdata);
	  print_r($request);
	  // Validate.
	  if(trim($request->name) === '')
	  {
		return http_response_code(400);
	  }
	  // Sanitize.
	  $name = mysqli_real_escape_string($con, trim($request->name));
	  // Create.
	  $sql = "INSERT INTO `song`(`name`, `length`) VALUES ('{$name}', '{$request->length}')";
	  if(mysqli_query($con,$sql))
	  {
		http_response_code(201);
		$detail = [
		  'name' => $name,
		  'length' => $request->length,
		  'id'    => mysqli_insert_id($con)
		];
		echo json_encode($detail);
	  }
	  else
	  {
		http_response_code(422);
	  }
  }	  

}