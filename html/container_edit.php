<?php
require_once('access_levels.php');
require_once('t1000.php');

mysql_connection_localhost_overwrite(DATABASE);
$template = file_get_contents('container_edit.htm');
$lexer = new Lexer($template);
$body = new BodyScope($lexer);

$body->verify();
if ($_REQUEST['_submit']) {
	$body->input_check();

	if ($body->satisfied) {
	  $body->execute();
		header('Location: container_search.php');
            return;
        }

}

$body->render();

?>
