<?php
 echo $descricao = $_POST['descricao'];
 echo $acrescimo = $_POST['acrescimo'];

include '../conexao.php';

    $sql = "INSERT INTO forma_pagamento(descricao, acrescimo) values('$descricao','$acrescimo')";
    $result = @mysql_query($sql);

    if($result){
        header("location:index_pagamento.php?msg=cadastro_sucesso");
    }
 else{
  header("location:index_pagamento.php?msg=erro");
}
