<?php
session_start();
if(@$_SESSION['nivel_usuario'] == null || $_SESSION['nivel_usuario'] != 'Admin'){
	echo "<script language='javascript'> window.location='../index.php' </script>";
}

require_once("../conexao.php"); 


//totais dos cards
$hoje = date('Y-m-d');
$mes_atual = Date('m');
$ano_atual = Date('Y');
$dataInicioMes = $ano_atual."-".$mes_atual."-01";

//Total de turmas
$select = $pdo->query("SELECT * FROM turmas")->fetchAll();
$totalTurmas = count($select);
//Total disciplinas
$select = $pdo->query("SELECT * FROM disciplinas")->fetchAll();
$totalDisc = count($select);
//Total Professores
$select = $pdo->query("SELECT * FROM professores")->fetchAll();
$totalProf = count($select);
//Total Alunos
$select = $pdo->query("SELECT * FROM alunos")->fetchAll();
$totalAlunos = count($select);
?>

<div class="row">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Alunos Cadastrados</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalAlunos ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-id-card fa-2x text-info"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Professores</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalProf ?> </div>
					</div>
					<div class="col-auto">
						<i class="fas fa-chalkboard-teacher fa-2x text-success"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Disciplinas</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalDisc ?> </div>
					</div>
					<div class="col-auto" align="center">
						<i class="fas fa-user-friends fa-2x text-primary"></i>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-secondary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Turmas</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalTurmas?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-secondary"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class = "row">
	<div class="col-xl-8 col-lg-7">
		<!-- Area Chart -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Calendario anual</h6>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col align-self-start">
						<h3></h3>
					</div>
				</div>
				<div class="row">
					<div class="col align-self-end">
						<div class="btn-group">
							<button class="btn btn-primary" data-calendar-nav="prev">Antes</button>
							<button class="btn btn-light" data-calendar-nav="today">Hoje</button>
							<button class="btn btn-primary" data-calendar-nav="next">Proximo</button>
						</div>
						<div class="btn-group">
							<button class="btn btn-warning" data-calendar-view="year">Ano</button>
							<button class="btn btn-warning active" data-calendar-view="month">Mês</button>
							<button class="btn btn-warning" data-calendar-view="day">Dia</button>
						</div>
					</div>
				</div>
					<div id="showEventCalendar"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Salas</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-pie pt-4">
						<canvas id="myPieChart"></canvas>
					</div>
					<div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Salas Ocupadas
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Salas Vazias
                        </span>
                    </div>
				</div>
			</div>
			<div class="card shadow mb-4">
				<h5 class="card-header">Feed</h5>
				<div class="card-body">
					<h5 class="card-title">Exemplo</h5>
					<p class="card-text">exemplo exemplificado de coisas exemplares</p>
					<a href="#" class="btn btn-info">Ver mais</a>
				</div>
				<hr class="sidebar-divider">
				<div class="card-body">
					<h5 class="card-title">Jotaro</h5>
					<p class="card-text">Pessoa consegue parar o tempo</p>
					<a href="#" class="btn btn-info">Ver mais</a>
				</div>
			</div>
		</div>
</div>