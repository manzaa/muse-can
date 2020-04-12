<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
  if ($request->artist) {
	  
	  // Validate.
	  if ((int)$request->id < 1 || trim($request->name) == '') {
		return http_response_code(400);
	  }

	  // Sanitize.
	  $id    = mysqli_real_escape_string($con, (int)$request->id);
	  $name = mysqli_real_escape_string($con, trim($request->name));

	  // Update.
	  $sql = "UPDATE `artist` SET `name`='$name' WHERE `id` = '{$id}' LIMIT 1";

	  if(mysqli_query($con, $sql))
	  {
		http_response_code(204);
	  }
	  else
	  {
		return http_response_code(422);
	  }  
  } else if($request->album) {
	  // Validate.
	  if ((int)$request->id < 1 || trim($request->name) == '' || (float)$request->date < 0) {
		return http_response_code(400);
	  }

	  // Sanitize.
	  $id    = mysqli_real_escape_string($con, (int)$request->id);
	  $name = mysqli_real_escape_string($con, trim($request->name));
	  $date = mysqli_real_escape_string($con, (float)$request->date);

	  // Update.
	  $sql = "UPDATE `album` SET `name`='$name',`date`='$date' WHERE `id` = '{$id}' LIMIT 1";
	  if(mysqli_query($con, $sql))
	  {
		http_response_code(204);
	  }
	  else
	  {
		return http_response_code(422);
	  }    
  } else if($request->song) {
	  print $sql;
	  // Validate.
	  if ((int)$request->id < 1 || trim($request->name) == '' || (float)$request->length < 0) {
		return http_response_code(400);
	  }

	  // Sanitize.
	  $id    = mysqli_real_escape_string($con, (int)$request->id);
	  $name = mysqli_real_escape_string($con, trim($request->name));
	  $length = mysqli_real_escape_string($con, (float)$request->length);

	  // Update.
	  $sql = "UPDATE `song` SET `name`='$name',`length`='$length' WHERE `id` = '{$id}' LIMIT 1";

	  if(mysqli_query($con, $sql))
	  {
		http_response_code(204);
	  }
	  else
	  {
		return http_response_code(422);
	  }  	  
  }
}