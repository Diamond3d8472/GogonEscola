<?php 
	$query = $pdo->query("SELECT * FROM turmas");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);

	for ($i=0; $i < count($res); $i++) { 
	foreach ($res[$i] as $key => $value) {
	}
		$disciplina = $res[$i]['disciplina'];
        $sala = $res[$i]['sala'];
        $professor = $res[$i]['professor'];
        $horario = $res[$i]['horario'];
        $dia = $res[$i]['dia'];
        $id = $res[$i]['id'];

		$query_r = $pdo->query("SELECT * FROM disciplinas where id =  '$disciplina'");
        $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
        $nome_disc = $res_r[0]['nome'];

		echo "<div class=\"row\">
			<div class = \"col-xl-12 col-md-6 mb-4\">
			<div class=\"card shadow h-100 py-2\">
			<div class=\"card-header\">
					$nome_disc
			</div>
			<table class=\"card-table table\">
				<thead>
				<tr>
					<th scope=\"col\">#</th>
					<th scope=\"col\">Nome</th>
					<th scope=\"col\">Email</th>
				</tr>
				</thead> <tbody>";

	 	$query_r = $pdo->query("SELECT aluno,nome,cpf,email FROM matriculas INNER JOIN alunos ON alunos.id = matriculas.aluno WHERE turma = '$id'");
        $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
		for($j=0; $j < count($res_r); $j++){
			$id_aluno = $res_r[$j]['aluno'];
	 		$nome_aluno = $res_r[$j]['nome'];
	 		$cpf_aluno = $res_r[$j]['cpf'];
	 		$email_aluno = $res_r[$j]['email'];
	 ?>
	 	<tr>
	 		<td><?php echo $id_aluno?></td>
	 		<td><?php echo $nome_aluno?></td>
	 		<td><?php echo $email_aluno?></td>
	 	</tr>
<?php } echo '</tbody> </table> </div> </div> </div>';
}?>