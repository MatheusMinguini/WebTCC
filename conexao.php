<?php
/**
 * Created by PhpStorm.
 * User: vinic
 * Date: 03/07/2016
 * Time: 18:34
 */

header('Content-Type: text/html; charset=utf-8');
$conn = @mysql_connect('127.0.0.1','root','');
if (!$conn) {
    die('Não foi possí­vel Conectar: ' . mysql_error());
}
mysql_select_db('tcc', $conn);

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
?>
