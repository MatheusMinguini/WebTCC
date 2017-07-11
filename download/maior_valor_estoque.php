<?php
include("../conexao.php");
$arquivo = 'download.xls';
$output = '';
if (isset($_POST["export_excel"])){
  $sql = "SELECT codigo_barra, nome, preco_custo, preco_venda, MAX(preco_custo) FROM produto
    WHERE vendido = 'n'
    GROUP BY codigo_barra, nome
    ORDER BY preco_custo DESC";
      $result = mysql_query($sql);
}



    if (mysql_num_rows($result) > 0){
      $output.= '
        <table>
          <tr>
            <th>codigo de barra<th>
            <th>Nome<th>
            <th>Preco de custo<th>
            <th>Preco de venda<th>
          </tr>
      ';
      while($row = mysql_fetch_array($result)){
      $output .='
          <tr>
            <td>'.$row["codigo_barra"].'<td>
            <td>'.$row["nome"].'<td>
            <td>'.$row["preco_custo"].'<td>
            <td>'.$row["preco_venda"].'<td>
          </tr>
        ';
      }

      $output .= '</table>';
      header("Content-Type: application/xlsx");
      header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
      echo $output;
    }
 ?>
