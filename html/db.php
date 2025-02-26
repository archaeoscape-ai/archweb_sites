<?php
/* T1000 Database template system
   (c) 2005 Archaeological Computing Laboratory, University of Sydney
   Developed by Tom Murtagh, Version 1.0,  16 Aug 2005 */

/* INSTRUCTIONS: Edit the user name and password (3 locations below) if needed
   The configure script will automatically substitute the readonly
   etc. names with the values provided to the script */

/* MySQL utility functions */

function mysql_connection_localhost_select($database='') {
/* User name and password for Select access */
	$username = 'coreaccess';
	$password = 'Safari_1';
   
	if (! $username and ! $password) { print "PLEASE SET USERNAME/PASSWORD for SELECT in db.php\n"; exit(2); }

        $db = mysql_connect('localhost', $username, $password) or die(mysql_error());
	if ($database != '') mysql_select_db($database) or die(mysql_error());

  
  mysql_query ("set character_set_client='utf8'"); 
  mysql_query ("set character_set_results='utf8'"); 
  mysql_query ("set collation_connection='utf8_unicode_ci'"); 


        return $db;
}
function mysql_connection_localhost_insert($database='') {
/* User name and password for insert access - must allow writing to database */
	$username = 'coreaccess';
	$password = 'Safari_1';
  
	if (! $username and ! $password) { print "PLEASE SET USERNAME/PASSWORD for INSERT in db.php\n"; exit(2); }

        $db = mysql_connect('localhost', $username, $password) or die(mysql_error());
	if ($database != '') mysql_select_db($database) or die(mysql_error());

  
  mysql_query ("set character_set_client='utf8'"); 
  mysql_query ("set character_set_results='utf8'"); 
  mysql_query ("set collation_connection='utf8_unicode_ci'"); 

        return $db;
}
function mysql_connection_localhost_overwrite($database='') {
/* User name and password for overwrite access - must allow writing to database */
	$username = 'coreaccess';
	$password = 'Safari_1';
  
	if (! $username and ! $password) { print "PLEASE SET USERNAME/PASSWORD for OVERWRITE in db.php\n"; exit(2); }

        $db = mysql_connect('localhost', $username, $password) or die(mysql_error());
	if ($database != '') mysql_select_db($database) or die(mysql_error());

  
  mysql_query ("set character_set_client='utf8'"); 
  mysql_query ("set character_set_results='utf8'"); 
  mysql_query ("set collation_connection='utf8_unicode_ci'"); 

        return $db;
}


function sql_niceify($val) {
	if (isset($val) and !is_null($val)) {
		return '"'.addslashes(preg_replace('/\r\n?/', "\n", $val)).'"';
	} else {
		return 'NULL';
	}
}


function mysql__insert($table, $pairs_assoc) {
	/* Insert a new row into the named table,
	 * with a key/value pair for every entry in the associative array.
	 */


	// Prepare statement
	$keys = array_keys($pairs_assoc);

	if (count($keys) == 0) return 1;
	else {
		$stmt = 'INSERT INTO ' . $table . ' (' . join(',', $keys) . ') VALUES (' . sql_niceify($pairs_assoc[$keys[0]]);
		for ($i=1; $i < count($keys); $i++) {
			$stmt .= ',' . sql_niceify($pairs_assoc[$keys[$i]]);
		}
		$stmt .= ')';
	}

error_log($stmt);

	return mysql_query($stmt);	// Maybe something bad, maybe something good!
}


function mysql__update($table, $condition, $pairs_assoc) {
	/* Update row/rows in the table with a fixed set of data:
	 * each key/value pair in the associative array.
	 * Be careful: $table and $condition are passed un-modified to the query.
	 */



	// Prepare statement
	$keys = array_keys($pairs_assoc);

	if (count($keys) == 0) return 1;
	else {
		$stmt = "UPDATE $table SET $keys[0] = " . sql_niceify($pairs_assoc[$keys[0]]);
		for ($i=1; $i < count($keys); $i++) {
			$stmt .= ',' . $keys[$i] . ' = ' . sql_niceify($pairs_assoc[$keys[$i]]);
		}
		$stmt .= " WHERE $condition";
	}

error_log($stmt);

	return mysql_query($stmt);	// Up to the user to check for error.
}


function mysql__select_array($table, $column, $condition) {
	/* Return an array containing all matching values of a column.
	 * $table, $column and $condition are passed un-modified to the query.
	 * NULL is returned on failure.
	 */


	$res = mysql_query("SELECT $column FROM $table WHERE $condition");
	if (! $res) return NULL;

	$matches = array();
	while (($row = mysql_fetch_array($res)))
		array_push($matches, $row[0]);

	return $matches;
}


function mysql__select_assoc($table, $key_column, $val_column, $condition) {
	/* Return an associative array containing all matching rows,
	 * using the two columns to construct an associative array.
	 * $table, $*column and $condition are passed un-modified to the query.
	 * NULL is returned on failure.
	 */


	$res = mysql_query("SELECT $key_column, $val_column FROM $table WHERE $condition");
	if (! $res) return NULL;

	$matches = array();
	while (($row = mysql_fetch_array($res)))
		$matches[$row[0]] = $row[1];

	return $matches;
}


function mysql__lookup($query) {
/* Run this query, reporting errors;
 * make a lookup table from the first column to an associative array of the remaining columns.
 */
	$res = mysql_query($query);
 
	if (! $res) {
		error_log('mysql__lookup: ' . mysql_error());
		return NULL;
	}

	$lookup = array();
	while (($row = mysql_fetch_assoc($res))) {
		$pri = array_shift($row);
		$lookup[$pri] = $row;
	}

	return $lookup;
}

?>
