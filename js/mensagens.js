<!-- login -->
var erroLogin = function() {
  sweetAlert("Oops...", "Não encontramos o usuario e/ou senha em nossa Base de dados", "error");
}

var erroRecuperaSenha = function() {
  alert("teste");
  sweetAlert("Oops...", "Não foi possível enviar a nova senha, confira o Email ou tente depois", "error");
}

var sucessoRecuperaSenha = function() {
  sweetAlert("Sucesso", "Nova senha enviada com sucesso ao Email", "success");
}

var confirma_logout = function(){
  swal({
    title: "Tem certeza que deseja sair do sistema?",
    text: "Um novo login será necessário!",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Não, desejo ficar!",
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sim, fazer logout!",
    closeOnConfirm: false,
  },
  function(isConfirm){
  if (isConfirm) {
    window.location.href="login/sair.php";
  } else {
    swal("Cancelled", "O seu registro está salvo :)", "error");
  }
});

}

var confirma_logout_menu = function(){
  swal({
    title: "Tem certeza que deseja sair do sistema?",
    text: "Um novo login será necessário!",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Não, desejo ficar!",
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sim, fazer logout!",
    closeOnConfirm: false,
  },
  function(isConfirm){
  if (isConfirm) {
    window.location.href="../login/sair.php";
  } else {
    swal("Cancelled", "O seu registro está salvo :)", "error");
  }
});

}



<!-- Usuário -->
var sucesso_cadastro_usuario = function() {
  swal({
      title : "Sucesso!",
      text : "Usuário cadastrado com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var sucesso_altera_usuario = function() {
  swal({
      title : "Sucesso!",
      text : "Usuário alterado com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var sucesso_exclusao_usuario = function() {
  swal({
      title : "Sucesso!",
      text : "usuário excluido com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var erroUsuario = function() {
  sweetAlert("Oops...", "Alguma coisa deu errado", "error");
}


var confirma_excluir_usuario = function(codigo){
  swal({
    title: "Tem certeza?",
    text: "Uma vez excluído, o registro não será recuperado!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sim, excluir!",
    closeOnConfirm: false,
  },
  function(isConfirm){
  if (isConfirm) {
    window.location.href="exclui_usuario.php?codigo=" + codigo;
  } else {
    swal("Cancelled", "O seu registro está salvo :)", "error");
  }
});

}




<!-- Clientes -->
var sucesso_cadastro_cliente = function() {
  swal({
      title : "Sucesso!",
      text : "Cliente cadastrado com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var sucesso_altera_cliente = function() {
  swal({
      title : "Sucesso!",
      text : "Cliente alterado com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var sucesso_exclusao = function() {
  swal({
      title : "Sucesso!",
      text : "Cliente excluido com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var erroCliente = function() {
  sweetAlert("Oops...", "Alguma coisa deu errado", "error");
}

var erro_exclusao_cliente = function() {
  sweetAlert("Oops...", "O cliente não pode ser excluido, pois o mesmo possui uma venda vinculada", "error");
}

var confirma_excluir_cliente = function(codigo){
  console.log(codigo);
  swal({
    title: "Tem certeza?",
    text: "Uma vez excluído, o registro não será recuperado!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sim, excluir!",
    closeOnConfirm: false,
    timer: 90000,
  },
  function(isConfirm){
  if (isConfirm) {
    window.location.href="exclui_cliente.php?codigo=" + codigo;
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");

  }
});

}

<!-- Fornecedor -->

var sucesso_cadastro_fornecedor = function() {
  swal({
      title : "Sucesso!",
      text : "Fornecedor cadastrado com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var sucesso_altera_fornecedor = function() {
  swal({
      title : "Sucesso!",
      text : "Fornecedor alterado com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var sucesso_exclusao_fornecedor = function() {
  swal({
      title : "Sucesso!",
      text : "Fornecedor excluido com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var erroFornecedor = function() {
  sweetAlert("Oops...", "Alguma coisa deu errado", "error");
}

var confirma_excluir_fornecedor = function(codigo){
  console.log(codigo);
  swal({
    title: "Tem certeza?",
    text: "Uma vez excluído, o registro não será recuperado!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sim, excluir!",
    closeOnConfirm: false,
  },
  function(isConfirm){
  if (isConfirm) {
    window.location.href="exclui_fornecedor.php?codigo=" + codigo;
  } else {
    swal("Cancelado", "O seu registro está salvo :)", "error");
  }
});

}

<!-- Produto -->

var sucesso_cadastro_produto = function() {
  swal({
      title : "Sucesso!",
      text : "Produto cadastrado com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var sucesso_altera_produto = function() {
  swal({
      title : "Sucesso!",
      text : "Produto alterado com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var sucesso_exclusao_produto = function() {
  swal({
      title : "Sucesso!",
      text : "Produto excluido com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var erroProduto = function() {
  sweetAlert("Oops...", "Alguma coisa deu errado", "error");
}

var confirma_excluir_produto = function(codigo){
  console.log(codigo);
  swal({
    title: "Tem certeza?",
    text: "Uma vez excluído, o registro não será recuperado!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sim, excluir!",
    closeOnConfirm: false,
  },
  function(isConfirm){
  if (isConfirm) {
    window.location.href="exclui_produtos.php?codigo=" + codigo;
  } else {
    swal("Cancelado", "O seu registro está salvo :)", "error");
  }
});

}


<!-- Forma de pagamento -->

var sucesso_cadastro_pagamento = function() {
  swal({
      title : "Sucesso!",
      text : "Forma de pagamento cadastrada com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var sucesso_altera_pagamento = function() {
  swal({
      title : "Sucesso!",
      text : "Forma de pagamento alterada com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var sucesso_exclusao_pagamento = function() {
  swal({
      title : "Sucesso!",
      text : "Forma de pagamento excluida com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var erro_excluir_pagamento = function() {
  sweetAlert("Oops...", "A Forma de pagamento não pode ser excluída, porque a mesma possui uma venda vinculada", "error");
}

var erroPagamento = function() {
  sweetAlert("Oops...", "Alguma coisa deu errada", "error");
}

var confirma_excluir_pagamento = function(codigo){
  console.log(codigo);
  swal({
    title: "Tem certeza?",
    text: "Uma vez excluído, o registro não será recuperado!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sim, excluir!",
    closeOnConfirm: false,
  },
  function(isConfirm){
  if (isConfirm) {
    window.location.href="exclui_pagamento.php?codigo=" + codigo;
  } else {
    swal("Cancelado", "O seu registro está salvo :)", "error");
  }
});

}



<!-- Venda -->

var erro_preenchimento_venda = function() {
  sweetAlert("Oops...", "Você deve ter esquecido de preencher algum campo. <br> Lembre-se: Os campos com '*' são obrigatórios", "error");
}

var sucesso_venda = function() {
  swal({
      title : "Sucesso!",
      text : "Venda realizada com sucesso!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

<!-- Pagamento -->
var sucesso_pagamento_residuo = function() {
  swal({
      title : "Sucesso!",
      text : "Pagamento registrado com sucesso! Porém a parcela não foi quitada!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var sucesso_pagamento = function() {
  swal({
      title : "Sucesso!",
      text : "Pagamento registrado com sucesso! A parcela foi quitada!",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

<!-- Email -->
var sucesso_email = function(){
  swal({
      title : "Sucesso!",
      text : "O Email foi enviado com sucesso",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var erro_email = function() {
  sweetAlert("Oops...", "Infelizmnte, não conseguimos enviar o Email, o servidor pode estar passando por algum problema," +
   "tente daqui a pouco, desculpe o transtorno", "error");
}

var sucesso_email_cobranca = function(){
  swal({
      title : "Sucesso!",
      text : "O Email de cobrança foi enviado com sucesso",
      type : "success",
      confirmButtonText : "Fechar"
    });
}

var erro_email_cobranca = function() {
  sweetAlert("Oops...", "Infelizmente, não conseguimos enviar o Email de cobrança.O servidor pode estar passando por algum problema, " +
   "tente daqui a pouco, desculpe o transtorno.", "error");
}

var confirma_enviar_email = function(codigo){
    swal({
        title: "Tem certeza que deseja enviar o Email de cobrança?",
        text: "O cliente pode sentir-se ofendido!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, quero enviar!",
        closeOnConfirm: false,
      },
      function(isConfirm){
      if (isConfirm) {
        window.location.href="../email/emailCobranca.php?codigo=" + codigo;
      } else {
        swal("Cancelado", "O seu registro está salvo :)", "error");
      }
    });
}
