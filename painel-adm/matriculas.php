<div class="row">
<?php
	if(@$_GET['id'] == null){
		echo "<script language='javascript'> window.location='index.php?pag=turmas' </script>";
	}
	$idTurma = @$_GET['id'];
	$pag = "matriculas";
	require_once("../conexao.php");
	@session_start();
    //verificar se o usuário está autenticado
	if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Admin'){
		echo "<script language='javascript'> window.location='../index.php' </script>";

	}
	$query = $pdo->query("SELECT * FROM turmas where id=$idTurma");
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

		echo "

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
					<th scope=\"col\">Ações</th>
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
			 <td>
			 	<a href="index.php?pag=notas" class='text-success mr-1' title='Notas'><i class='far fa-file-alt'></i></a>
                <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
            </td>
	 	</tr>
<?php } echo '</tbody> </table> </div> </div>';
}?>
</div>