<?php

  include ("../conexao.php");

  $codigo = $_GET['codigo'];

  //--------------------------------------------------------------------------
  // 2) Query database for data
  //-------------------------------------------------------------------------

  $result = mysql_query("SELECT codigo, acrescimo FROM forma_pagamento WHERE codigo='".$codigo."'");          //query
  $array = mysql_fetch_row($result);                          //fetch result

  //--------------------------------------------------------------------------
  // 3) echo result as json
  //--------------------------------------------------------------------------

  echo json_encode($array);

?>
