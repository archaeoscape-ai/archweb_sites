<?php

require_once('t1000.php');

mysql_connection_localhost_overwrite(DATABASE);
$template = file_get_contents('worksiteresource_add.htm');
$lexer = new Lexer($template);
$body = new BodyScope($lexer);

$body->verify();
if ($_REQUEST['_submit']) {
	$body->input_check();
	if ($body->satisfied) {
		if ($rv = $body->execute()) {
			header('Location: worksiteresource_additional.php?worksiteresource_id='.$rv);
		}
	}
}


header('Content-type: text/html; utf-8');
$body->render();

?>