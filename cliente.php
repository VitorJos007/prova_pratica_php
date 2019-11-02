<?PHP
//caminho do arquivo de conexão ao banco de dados
include("conexao.php"); 

//executa a consulta
$sql    = "select * from cliente order by id";
$res    = mysqli_query($con, $sql); 

// conta o número de registros
$total = mysqli_num_rows($res);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Jekyll v3.8.5">
<title>Tela 2</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
.bd-placeholder-img {
	font-size: 1.125rem;
	text-anchor: middle;
}
 @media (min-width: 768px) {
.bd-placeholder-img-lg {
	font-size: 3.5rem;
}

.botaocad{
float:right
}

}
</style>

    <script src=" js/jquery-3.3.1.min.js" type="text/javascript"></script> 
     <script src=" js/jquery.mask.min.js" type="text/javascript"></script>
     
     <script type="text/javascript">
	 $(document).ready(function(){
			$("#$f['cpf']").mask("000.000.000-00");
		})
	 </script>
<!-- Custom styles for this template -->
<link href="css/dashboard.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow"> <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Minha empresa</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap"> <a class="nav-link" href="#">Sair</a> </li>
  </ul>
</nav>
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item"> <a class="nav-link" href="Dashboard.php"> <span data-feather="home"></span> Dashboard <span class="sr-only">(current)</span> </a> </li>
          <li class="nav-item"> <a class="nav-link active" href="cliente.php"> <span data-feather="file"></span> Cliente </a> </li>
        </ul>
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cliente</h1>
      </div>
      <div class="botaocad">
      	<a href="cadastro.php" class="btn btn-sm btn-link">Cadastrar +</a>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Endereço</th>
              <th>CPF</th>
            </tr>
          </thead>
          	<tbody>
<?PHP
while ($f = mysqli_fetch_array($res))
{ 
?>      
           <tr>
           		<td><?PHP echo $f['id']; ?></td>
          	    <td><?PHP echo $f['nome']; ?></td>
           		<td><?PHP echo $f['email']; ?></td>
           		<td><?PHP echo $f['endereco']; ?></td>
           		<td><?PHP echo $f['cpf']; ?></td>
				<td class="act">
                     <a href ="alterar.php?id=<?=$f['id'];?>" class="btn btn-sm btn-primary">Editar</a>
               		 <a href="excluir.php?id=<?=$f['id'];?>"class="btn btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
<?PHP            
}

//fecha a conexão
mysqli_close($con);
?>          
			</tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<script src=" js/feather.min.js"></script> 
<script src="js/dashboard.js"></script>
</body>
</html>
