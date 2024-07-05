<?php
$version = phpversion();
print $version;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "coreaccess", "Safari_1");

/* print server version */
printf("\nServer version: %d\n", $mysqli->server_version);
?>
