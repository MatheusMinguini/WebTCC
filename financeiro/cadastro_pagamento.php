<?php
 echo $descricao = $_POST['descricao'];
 echo $numero_parcelas = $_POST['numero_parcelas'];
 echo $numero_dias = $_POST['numero_dias'];
 echo $acrescimo = $_POST['acrescimo'];

include '../conexao.php';

    $sql = "INSERT INTO forma_pagamento(descricao, numero_parcelas, numero_dias, acrescimo) values('$descricao', '$numero_parcelas', '$numero_dias', '$acrescimo')";
    $result = @mysql_query($sql);

    if($result){
        header("location:index_pagamento.php?msg=cadastro_sucesso");
    }
 else{
  header("location:index_pagamento.php?msg=erro");
}
