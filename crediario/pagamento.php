<?php
include '../conexao.php';

$id = $_REQUEST['codigo'];
$id_usuario = $_POST['id_usuario'];
$id_venda = $_POST['id_venda'];
$data_pagamento = $_POST['data_pagamento'];
$valor_parcela = $_POST['valor_parcela'];
$valor_pago = $_POST['valor_pago'];
$residuo = $_POST['residuo'];
$valor_novo = $valor_parcela - $valor_pago;

if ($valor_pago < $valor_parcela){
      $query  = "UPDATE parcelas SET  valor_parcela='".$valor_novo."' WHERE id=".$id;
      $query1 = "INSERT INTO historico_pagamento(id_parcela, total_pago, data_pagamento, id_usuario) VALUES ($id, $valor_pago, '$data_pagamento', $id_usuario)";
      header("Location:index_crediario.php?msg=pagamento_sucesso_residuo");
}else if ($valor_pago == $valor_parcela){
      $query1 = "INSERT INTO historico_pagamento( id_parcela, total_pago, data_pagamento, id_usuario) VALUES ($id, $valor_pago, '$data_pagamento', $id_usuario)";
      $query  = "UPDATE parcelas SET  pago = 's' WHERE id = ".$id;
}

mysql_query($query) or die($query."<br>".mysql_error());
mysql_query($query1) or die($query1."<br>".mysql_error());

$result = @mysql_query($query);

if ($result){
   header("location:index_crediario.php?msg=sucesso_pagamento_residuo");
}
