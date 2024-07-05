<?php

//get_user_id();

require_once('t1000.php');

mysql_connection_localhost_overwrite(DATABASE);
$template = file_get_contents('worksite_edit.htm');
$lexer = new Lexer($template);
$body = new BodyScope($lexer);

$body->verify();
if ($_REQUEST['_submit']) {
	$body->input_check();
	if ($body->satisfied) {
		$body->execute();
		header('Location: worksite_liminal.php?worksite_id='.$_REQUEST['worksite_id']);
	}
}
header('Content-type: text/html; utf-8');
$body->render();

?>
