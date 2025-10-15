<?php

// Parametro: string => $txt
// Retorno: string => "<td>$txt</td>"
function create_table_cell($txt){
	return '<td>' . $txt . '</td>';
}

// Parametro: vetor => $cells (colunas de uma linha da tabela)
// Retorno: string => "<tr><td>$cells[0]</td><td>$cells[1]</td>...</tr>
// Deve utilizar a funcao create_table_cell
function create_table_row($cells){
	if (is_array($cells)) {
		$linha = '<tr>';

		foreach ($cells as $cel) {
			$linha .= create_table_cell($cel);
		}

		$linha .= '</tr>';
		return $linha;
	}

}

// Parametro: matriz => $rows (linhas e celulas da tabela)
// Retorno: string => "<table class='table'><tr><td>$rows[0][0]</td><td>$rows[0][1]</td>...</tr><tr><td>$rows[1][0]</td><td>$rows[1][1]</td>...</tr>...</table>"
// Deve utilizar a funcao create_table_row
function create_table($rows){
	if (is_array($rows)) {
		$tabela = '<table class="table">';

		foreach ($rows as $row) {
			$tabela .= create_table_row($row);
		}

		$tabela .= '</table>';
		return $tabela;
	}
}

// Parâmetro: inteiro => $n (número de linhas da matriz)
// Retorno: matriz ($n x $n+1) => matriz de potência como no enunciado
function power_matrix($n){
  $matrix = array();

	for ($i=0; $i<$n; $i++) {
    $matrix[$i] = array();
    $matrix[$i][0] = $i+1;
		for ($j=1; $j<$n+1; $j++) {
			$matrix[$i][$j] = $matrix[$i][$j-1] * ($i+1);
		}
	}

  return $matrix;

}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Teste PHP</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid">
    <div class="table-responsive">
      <h1>Tabela de potências</h1>
      <?php
      $n = $_GET["n"];
      $m = power_matrix($n);
      echo create_table($m);
      ?>
    </div>
  </div>
</body>
</html>