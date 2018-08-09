<?php
require_once 'LISTADEPRECIOS_api.php';

$API = new ListaDePreciosApi($_REQUEST['request']);
echo $API->processAPI();
?>
