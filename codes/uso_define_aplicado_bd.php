<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/cloud/lib/_sys/c/_main.php");

    gc::botao_history_back();
	gc::get_html_head("dev_php", "uso_define_aplicado_bd", gc::get_ip());
?>

define ("DB_HOST", ""); // set database host
define ("DB_USER", ""); // set database user
define ("DB_PASS", ""); // set database password
define ("DB_NAME", ""); // set database name

É possivel acessar as variaveis define pela aplicação toda, desde que seja referenciado o arquivo.

<?php gc::get_footer(); ?>