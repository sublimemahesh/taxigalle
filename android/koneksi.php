<?php
	/* ===== www.dedykuncoro.com ===== */
	$server		= "localhost"; //sesuaikan dengan nama server
	$user		= "gallnwxt_galletaxi"; //sesuaikan username
	$password	= "gallnwxt_galletaxi@321"; //sesuaikan password
	$database	= "gallnwxt_galletaxi"; //sesuaikan target databese
	
	
	
	// private $host = 'localhost';
    // private $name = 'gallnwxt_galletaxi';
    // private $user = 'gallnwxt_galletaxi';
    // private $password = 'gallnwxt_galletaxi@321';
	
	

	$connect = mysql_connect($server, $user, $password) or die ("Invalid login details");
	mysql_select_db($database) or die ("Unable to select database!");

	/* ====== UNTUK MENGGUNAKAN MYSQLI DI UNREMARK YANG INI, YANG MYSQL_CONNECT DI REMARK ======= */
	// $con = mysqli_connect($server, $user, $password, $database);
	// if (mysqli_connect_errno()) {
	// 	echo "Gagal terhubung MySQL: " . mysqli_connect_error();
	// }

?>