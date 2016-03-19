<?php
  $args = json_decode(file_get_contents("php://input"));
  function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
  }

# Here we establish the connection. Yes, that's all.
  $pg_conn = pg_connect(pg_connection_string_from_database_url());
# Now let's use the connection for something silly just to prove it works:
  $query="insert into users values ('".$args->pnr."','".$args->mobileNo."','".date('Y-m-d G:i:s')."','".date( 'Y-m-d G:i:s', strtotime( $timestamp_from_array ) + 13 * 3600 )."',1);";
  $result = pg_query($pg_conn, $query);
  if($result)
  	echo json_encode(array('status' =>1,'query'=>$query));
  else
  	echo json_encode(array('status' =>0,'query'=>$query));

?>  