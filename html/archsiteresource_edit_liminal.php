<?php

require_once('t1000.php');

mysql_connection_localhost_select(DATABASE);
$template = file_get_contents('archsiteresource_edit_liminal.htm');
$lexer = new Lexer($template);
$body = new BodyScope($lexer);

$body->verify();


header('Content-type: text/html; charset=utf-8');


$body->render();

?>
