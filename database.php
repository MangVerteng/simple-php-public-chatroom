<?php

/**
 * @file
 * Connect to mysql
 */
$con = mysqli_connect("localhost","root","","shoutit");

//Test Connection
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}

?>
