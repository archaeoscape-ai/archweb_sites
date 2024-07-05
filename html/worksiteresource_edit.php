<?php

require_once('t1000.php');


mysql_connection_localhost_overwrite(DATABASE);
$template = file_get_contents('worksiteresource_edit.htm');
$lexer = new Lexer($template);
$body = new BodyScope($lexer);



$body->verify();
if ($_REQUEST['_submit']) {
	$body->input_check();
	if ($body->satisfied) {
		$body->execute();
		header('Location: worksiteresource_edit_liminal.php?worksiteresource_id='.$_REQUEST['worksiteresource_id']);
	}
}
header('Content-type: text/html; utf-8');
$body->render();

?>