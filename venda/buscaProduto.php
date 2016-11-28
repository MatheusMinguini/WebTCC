<?php

  include ("../conexao.php");

  $codigoBarra = $_GET['codigoBarra'];

  //--------------------------------------------------------------------------
  // 2) Query database for data
  //-------------------------------------------------------------------------

  $result = mysql_query("SELECT codigo, codigo_barra, nome, preco_venda FROM produto WHERE codigo_barra='".$codigoBarra."'");          //query
  $array = mysql_fetch_row($result);                          //fetch result
  //--------------------------------------------------------------------------
  // 3) echo result as json
  //--------------------------------------------------------------------------

  echo json_encode($array);

?>
