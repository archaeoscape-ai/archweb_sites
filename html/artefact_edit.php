<?php

require_once('t1000.php');

mysql_connection_localhost_overwrite(DATABASE);
$template = file_get_contents('artefact_edit.htm');
$lexer = new Lexer($template);
$body = new BodyScope($lexer);

$body->verify();

if ($_REQUEST["_submit"]) {
    $body->input_check();
    if ($body->satisfied) $body->execute();
}
$body->render();



  /*

$body->verify();
if ($_REQUEST['_submit']) {
	$body->input_check();

	if ($body->satisfied) {
	  $body->execute();
		header('Location: artefact_search.php');
            return;
        }

}

$body->render();

*/

?>
