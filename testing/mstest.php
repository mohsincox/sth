<?php

// $connection = mssql_connect('DESKTOP-371M6TD\MOHSINSQL', 'sa', '123456');

// if (!$connection) {
//   die('Unable to connect!');
// }

// if (!mssql_select_db('attendance', $connection)) {
//   die('Unable to select database!');
// }

// $result = mssql_query('SELECT  NAME FROM USERINFO');

// while ($row = mssql_fetch_array($result)) {
//   var_dump($row);
// }

// mssql_free_result($result);

?>




<?php
// $myServer = "DESKTOP-371M6TD\MOHSINSQL";
// $myUser = "sa";
// $myPass = "123456";
// $myDB = "attendance"; 

// //connection to the database
// $dbhandle = mssql_connect($myServer, $myUser, $myPass)
//   or die("Couldn't connect to SQL Server on $myServer"); 

// //select a database to work with
// $selected = mssql_select_db($myDB, $dbhandle)
//   or die("Couldn't open database $myDB"); 

// //declare the SQL statement that will query the database
// $query = "SELECT USERID, CHECKTIME, CHECKTYPE ";
// $query .= "FROM checkinout ";
// // $query .= "WHERE name='BMW'"; 

// //execute the SQL query and return records
// $result = mssql_query($query);

// $numRows = mssql_num_rows($result); 
// echo "<h1>" . $numRows . " Row" . ($numRows == 1 ? "" : "s") . " Returned </h1>"; 

// //display the results 
// while($row = mssql_fetch_array($result))
// {
//   echo "<li>" . $row["USERID"] . $row["CHECKTIME"] . $row["CHECKTYPE"] . "</li>";
// }
// //close the connection
// mssql_close($dbhandle);
?>


<?php
	// $serverName = "DESKTOP-371M6TD\MOHSINSQL";
	// $connectionInfo = array( "Database"=>"attendance", "UID"=>"sa", "PWD"=>"123456");
	$serverName = "192.168.100.68\SQLEXPRESS";
	$connectionInfo = array( "Database"=>"ZKF18", "UID"=>"sa", "PWD"=>"myadmin!@#");
	$conn = sqlsrv_connect( $serverName, $connectionInfo );
	if( $conn === false ) {
	    die( print_r( sqlsrv_errors(), true));
	}

	$startDateTime = date('Y-m-d') . ' 00:00:00';
    $endDateTime = date('Y-m-d') . ' 23:59:59';

	// $sql = "SELECT USERID, CHECKTIME FROM checkinout";
	// $sql = "SELECT TOP 3 * FROM checkinout";
	
	// $sql = "SELECT USERID, MIN(CHECKTIME) AS minCHECKTIME, MAX(CHECKTIME) AS maxCHECKTIME, COUNT(USERID) AS Total FROM checkinout WHERE CHECKTIME BETWEEN '$startDateTime' AND '$endDateTime' GROUP BY  USERID";
	$sql = "SELECT checkinout.USERID AS USERID, MAX(userinfo.NAME) AS NAME, MIN(userinfo.BADGENUMBER) AS BADGENUMBER, MIN(checkinout.CHECKTIME) AS minCHECKTIME, MAX(checkinout.CHECKTIME) AS maxCHECKTIME, COUNT(checkinout.USERID) AS Total FROM checkinout INNER JOIN userinfo ON userinfo.USERID = checkinout.USERID WHERE checkinout.CHECKTIME BETWEEN '$startDateTime' AND '$endDateTime' GROUP BY  checkinout.USERID";
	$stmt = sqlsrv_query( $conn, $sql );
	if( $stmt === false) {
	    die( print_r( sqlsrv_errors(), true) );
	}

	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	      // echo $row['USERID'].", ".$row['CHECKTIME']->format('d/m/Y')."<br />";
	      echo $row['USERID'].", ".$row['NAME'].", ".$row['BADGENUMBER'].", ".$row['minCHECKTIME']->format('Y-m-d H:m:s').", ".$row['maxCHECKTIME']->format('Y-m-d H:m:s').", ".$row['Total']."<br />";
	}

	sqlsrv_free_stmt( $stmt);
?>