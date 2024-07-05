<?php



require_once('t1000.php');

mysql_connection_localhost_overwrite(DATABASE);
$template = file_get_contents('container_add.htm');
$lexer = new Lexer($template);
$body = new BodyScope($lexer);

$body->verify();

if ($_REQUEST['_submit']) {
        $body->input_check();

        if ($body->satisfied) $primary_key = $body->execute();

        if ($primary_key) {     /* entry was added: redirect to edit page */
                header('Location: container_search.php');
                return;
        }
}


$body->render();

?>