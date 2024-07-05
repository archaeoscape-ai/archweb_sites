<?php

require_once('t1000.php');

mysql_connection_localhost_overwrite(DATABASE);
$template = file_get_contents('archsiteresource_additional.htm');
$lexer = new Lexer($template);
$body = new BodyScope($lexer);

$body->verify();
if ($_REQUEST['_submit']) {
	$body->input_check();
	if ($body->satisfied) {
		$body->execute();
		header('Location: archsite_additional.php?archsiteresource_id='.$_REQUEST['archsiteresource_id']);
	}
}
header('Content-type: text/html; utf-8');
$body->render();

?>