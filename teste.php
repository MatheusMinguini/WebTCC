

<div class="container">
  <h2>Basic Panel</h2>
  <div class="panel panel-default">
    <h2>Cardápio</h2>
    <div class="panel-body">


       <table class="table table-bordered">
        <thead id="titulo">
          <tr>
            <th id="opcoes">
              <center><i class="fa fa-cog"></i></center>
            </th>
            <th style="width: 300px;">
              <center>Data de cadastro</center>
            </th>
            <th>
              <center>Descrição do prato</center>
            </th>
            <th>
              <center>Descrição do primeiro acompanhamento</center>
            </th>
            <th>
              <center>Descrição do segundo acompanhamento</center>
            </th>
            <th>
              <center>Salada</center>
            </th>
            <th>
              <center>Suco </center>
            </th>
            <tbody>
              <tr>

                <td>
                  <a href="formAlteraFornecedor.php?codigo=<?=$linha['codigo']?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                  <a href="#" onclick="confirma_excluir_fornecedor(<?=$linha['codigo']?>);" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                </td>

                <td>
                  <a></a>
                </td>

                <td>
                  <a></a>
                </td>

                <td>
                  <a></a>
                </td>

                <td>
                  <a></a>
                </td>

                <td>
                  <a></a>
                </td>

              </tr>
            </tbody>
          </tr>
        </thead>

    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
