<?php
  include_once '../conexao.php';

  $obj = json_decode($_POST['data'], true);
  $id_usuario = $obj['usuario'];
  $id_client = $obj['id_client'];
  $data_venda = $obj['data_venda'];
  $forma_pagamento = $obj['forma_pagamento'];
  $total = $obj['total'];
  $itensVenda = $obj['itensVenda'];
  $vencimentos = $obj['vencimento'];
  $valorParcela = $obj['valorParcela'];
  $numero_parcelas = $obj['parcelas'];



  $sql_venda = "INSERT INTO venda (id_usuario, id_cliente, forma_pagamento, data_venda, total) VALUES ($id_usuario, '$id_client', '$forma_pagamento', '$data_venda', '$total')";
  $result = @mysql_query($sql_venda);

  $id_venda = mysql_insert_id();


  if ($result) {
    foreach ($itensVenda as &$value) {
      $sql_itensvenda = "INSERT INTO itens_venda (id_venda, id_produto) VALUES ('$id_venda', '$value')";
      $result_itensvenda = @mysql_query($sql_itensvenda);
    }
    $conta = 1;
    foreach ($vencimentos as $value) {
      $sql_parcelas = "INSERT INTO parcelas (id_venda, data_vencimento, valor_parcela, numero_parcelas, posicao_parcelas) VALUES ('$id_venda', '$value', '$valorParcela', '$numero_parcelas', '$conta')";
      $result_parcelas = @mysql_query($sql_parcelas);
      $conta++;
    }
  }
?>
