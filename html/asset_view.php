<?php

require_once('t1000.php');

mysql_connection_localhost_select(DATABASE);
$template = file_get_contents('asset_view.htm');
$lexer = new Lexer($template);
$body = new BodyScope($lexer);

$body->verify();
$body->render();

?>
