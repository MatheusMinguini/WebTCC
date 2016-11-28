<?php

$id = intval($_REQUEST['codigo']);

include '../conexao.php';


$sql1 = "SELECT forma_pagamento, COUNT(*) FROM venda WHERE forma_pagamento = $id GROUP BY forma_pagamento";
$dados = mysql_query($sql1);
$total_registros = mysql_num_rows($dados);

echo $total_registros;

  if ($total_registros > 0){
      header("location:index_pagamento.php?msg=erro_excluir_pagamento");
    }else{
        $sql = "DELETE FROM forma_pagamento WHERE codigo=$id";
        $ok = mysql_query($sql, $conn);
        header("location:index_pagamento.php?msg=sucesso_excluir_pagamento");
 }
mysql_close();
