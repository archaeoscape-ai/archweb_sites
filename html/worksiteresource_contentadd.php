<?php

require_once('t1000.php');

mysql_connection_localhost_overwrite(DATABASE);
$template = file_get_contents('worksiteresource_contentadd.htm');
$lexer = new Lexer($template);
$body = new BodyScope($lexer);

$body->verify();

if ($_REQUEST['_submit']) {
        $body->input_check();

        if ($body->satisfied) $primary_key = $body->execute();

        if ($primary_key) {     /* entry was added: redirect to edit page */
                header('Location: worksiteresource_contentadd.php');
                return;
        }
}


$body->render();

?>