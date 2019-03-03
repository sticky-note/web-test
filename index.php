<?php
  $mysqli = new mysqli( "localhost", "app_dba", "app_pwd", "app_db" );
  /* check connection */
  if ( $mysqli->connect_errno ) {
    printf( "Connect failed: %s\n", $mysqli->connect_error );
    exit();
  }

  $ctable = $mysqli->query( "CREATE TABLE IF NOT EXISTS test ( id int, test varchar(10) );" );
  $insert = $mysqli->query( "INSERT INTO test VALUES ( 1, 'OOOOOOOOOO');" );
  $query = "SELECT * FROM test;";

  if ( $result = $mysqli->query( $query ) ) {
    /* fetch associative array */
    printf( "<html>\n<head></head>\n<body>" );
    while ( $row = $result->fetch_assoc() ) {
      printf( "<div>%s - (%s)</div>", $row["id"], $row["test"] );
    }
    /* free result set */
    $result->free();
    printf( "</body>\n</html>" );
  }

  /* close connection */
  $mysqli->close();
?>
