<?php


require_once('t1000.php');

mysql_connection_localhost_select(DATABASE);
$template = file_get_contents('worksites.htm');
$lexer = new Lexer($template);
$body = new BodyScope($lexer);

$body->verify();
$body->input_check();
if ($body->satisfied) $body->execute();

$body->render();

?>