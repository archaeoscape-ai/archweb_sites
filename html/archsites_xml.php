<?php

require_once("t1000.php");
mysql_connection_localhost_select(DATABASE);

$template = file_get_contents("archsites_xml.htm");
$lexer = new Lexer($template);
$body = new BodyScope($lexer);

$body->verify();

    header("Content-Type: text/xml; charset=utf-8");

$body->render();
   
?>