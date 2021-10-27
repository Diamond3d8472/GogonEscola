<?php 
// require_once("conexao.php");

//CRIAR AUTOMATICAMENTE O USUARIO ADMIN
// $query = $pdo->query("SELECT * FROM usuarios where nivel = 'admin'");
// $res = $query->fetchAll(PDO::FETCH_ASSOC);
// $total_reg = @count($res);
// if($total_reg == 0){
// 	$res = $pdo->query("INSERT INTO usuarios SET nome = 'Administrador', cpf = '000.000.000-00', email = '$email_adm', senha = '123', nivel = 'Admin'");	
// }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Faça seu Login</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/frytyler/pen/EGdtg" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'><script src='https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js'></script>

	<link rel="icon" href=" img/icone.png" type="image/png">

	 <!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<!-- Fim da head -->
<body>
	<img class="wave" src="img/wave.png" alt='Sem suporte a imagem'>
		<div class="container">
			<div class="img">
				<img src="img/bg.svg">
			</div>
			<div class="login-content">
				<form class= "form-login" method="POST" action="autenticar.php">
					<img src="img/avatar.svg" alt='Sem suporte a imagem'>
					<h2 class="title">Bem-vindo</h2>
					<h4>Entre com login</h4>
					<div class="input-div one">
					<div class="i">
							<i class="fas fa-user"></i>
					</div>
					<div class="div">
							<h5>E-mail</h5>
							<input type="text" name="email" class="input" required>
					</div>
					</div>
					<div class="input-div pass">
					<div class="i"> 
							<i class="fas fa-lock"></i>
					</div>
					<div class="div">
							<h5>Senha</h5>
							<input type="password" name="senha" class="input" required>
					</div>
					</div>
					<div class="row">
						<a href="" data-toggle="modal" data-target="#modalRecuperar" title="Clique para Recuperar sua Senha" class="text-decoration-none">Recuperar Senha?</a>
					</div>
					<input type="submit" class="btnn" value="Login">
				</form>
			</div>
		</div>
		<script type="text/javascript" src="js/main.js"></script>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="modalRecuperar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Recuperar Senha</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" id="form">
				<div class="modal-body">
					<div class="form-group">
						<label >Seu Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email">
					</div>

					<small>
						<div id="mensagem">

						</div>
					</small> 

				</div>
				<div class="modal-footer">
					<button id="btn-fechar" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-info">Recuperar</button>
				</div>
			</form>
		</div>
	</div>
</div>



<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM OU SEM IMAGEM -->
<script type="text/javascript">
	$("#form").submit(function () {
		
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url:"recuperar.php",
			type: 'POST',
			data: formData,

			success: function (mensagem) {
				$('#mensagem').removeClass()
				if (mensagem.trim() == "Sua senha foi Enviada para seu Email!") {
                    //$('#nome').val('');
                    //$('#btn-fechar').click();
                    $('#mensagem').addClass('text-success')
                } else {
                	$('#mensagem').addClass('text-danger')
                }
                $('#mensagem').text(mensagem)
            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
            	var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                	myXhr.upload.addEventListener('progress', function () {
                		/* faz alguma coisa durante o progresso do upload */
                	}, false);
                }
                return myXhr;
            }
        });
	});
</script>


