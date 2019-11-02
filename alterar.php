<?PHP 
include('conexao.php');
include("validacao.php");
$id =$_GET['id'];
$sql = "select * from cliente where id='$id'";

$retorno = mysqli_query($con, $sql);

while ($f = mysqli_fetch_array($retorno))
{
  $id=$f["id"];
  $nome=$f["nome"];
  $cpf=$f["cpf"];	
  $email=$f["email"];
  $endereco=$f["endereco"];
  $numero=$f["numero"];
  $bairro=$f["bairro"];
  $cidade=$f["cidade"];
  $cep=$f["cep"];
  $uf=$f["uf"];

}
?>
  <!doctype html>
  <html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	  <meta name="generator" content="Jekyll v3.8.5">
	  <title>Alterar</title>
  
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
		}
	  </style>
      
        <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
     <script src=" js/jquery-3.3.1.min.js" type="text/javascript"></script> 
     <script src=" js/jquery.mask.min.js" type="text/javascript"></script>         
            
      <script type="text/javascript">
	  function validaCampo()
	  {
		if(document.cadastro.nome.value=="")
				{
			    alert("O campo nome é obrigatório!");
				return false;
				}
		else
				if(document.cadastro.cpf.value=="")
				{
				alert("O campo cpf é obrigatório!");
				return false;
				}
		else
		return true;
	  }
	  
	  $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#new_endereco").val("");
                $("#new_bairro").val("");
                $("#new_cidade").val("");
                $("#new_uf").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#new_cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var new_cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (new_cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(new_cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#new_endereco").val("...");
                        $("#new_bairro").val("...");
                        $("#new_cidade").val("...");
                        $("#new_uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ new_cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#new_endereco").val(dados.logradouro);
                                $("#new_bairro").val(dados.bairro);
                                $("#new_cidade").val(dados.localidade);
                                $("#new_uf").val(dados.uf);
                                
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
		
		$(document).ready(function(){
			$("#new_cpf").mask("000.000.000-00");
		})
	</script>	  
		  
		  
	  <!-- Custom styles for this template -->
	  <link href="css/dashboard.css" rel="stylesheet">
	</head>
	<body>
	  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Minha empresa</a>
	<ul class="navbar-nav px-3">
	  <li class="nav-item text-nowrap">
		<a class="nav-link" href="#">Sair</a>
	  </li>
	</ul>
  </nav>
  
  <div class="container-fluid">
	<div class="row">
	  <nav class="col-md-2 d-none d-md-block bg-light sidebar">
		<div class="sidebar-sticky">
		  <ul class="nav flex-column">
			<li class="nav-item">
			  <a class="nav-link" href="Dashboard.php">
				<span data-feather="home"></span>
				Dashboard
			  </a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="cliente.php">
				<span data-feather="file"></span>
				Cliente
			  </a>
			</li>
		  </ul>
		</div>
	  </nav>
		  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		  <h1 class="h2">Cadastro de Clientes</h1>
		</div>
		<form id="cadastro" name="alterar" action="alterar_bd.php?id=<?=$id;?>" method="post" onsubmit="return validaCampo(); return false;">	 
		 <!-- area de campos do form -->	  
		 <hr />	 
		  <div class="row">	   
               <div class="form-group col-md-1">	     
                <label for="name">ID</label>	  
                <input type="text" class="form-control" name="id" id="id" value="<?=$id?>" disabled>	
               </div>	
                        
              <div class="form-group col-md-4">
               <label for="campo2">Nome</label>
               <input type="text" required class="form-control" name="new_nome" id="new_nome" value="<?=$nome?>">	
              </div>
                      
              <div class="form-group col-md-2">	      
                <label for="campo3">CPF</label>	      
                <input type="text" required class="form-control" name="new_cpf" id="new_cpf" value="<?=$cpf?>">	  
              </div>                    
               	 
	    </div>	  
						
		<div class="row">
        
        	<div class="form-group col-md-4">	
                <label for="campo3">Email</label>	
                <input type="email" class="form-control" name="new_email" id="new_email" value="<?=$email?>">
             </div>
             
			<div class="form-group col-md-5">
				<label for="campo1">Endereço</label>	  
                <input type="text" class="form-control" name="new_endereco" id="new_endereco" value="<?=$endereco?>">	
			</div>
											  
	       <div class="form-group col-md-2">	
			   <label for="campo2">Numero</label>
			   <input type="text" class="form-control" name="new_numero" id="new_numero" value="<?=$numero?>">	
           </div>	    
        </div> 	
           
        <div class="row">
                   
           <div class="form-group col-md-3">	
			   <label for="campo2">Bairro</label>
			   <input type="text" class="form-control" name="new_bairro" id="new_bairro" value="<?=$bairro?>">	

           </div>
           
            <div class="form-group col-md-3">	
               <label for="campo1">Cidade</label>
               <input type="text" class="form-control" name="new_cidade" id="new_cidade" value="<?=$cidade?>">
              </div>
						
	     <div class="form-group col-md-2">	 
			 <label for="campo3">CEP</label>	
		     <input type="text" class="form-control" name="new_cep" id="new_cep" value="<?=$cep?>">	
	    </div>												  	
                                                                            
        <div class="form-group col-md-2">	      
             <label for="campo3">UF</label>	      
             <input type="text" class="form-control" name="new_uf" id="new_uf" value="<?=$uf?>">	  
       </div>	 
    </div>
    	  	
    <div id="actions" class="row">	  
        <div class="col-md-12">	    
            <button type="submit" class="btn btn-primary" value="Salvar">Salvar</button>	   
            <a href="cliente.php" class="btn btn-info">Cancelar</a>	
            <button type="reset" class="btn btn-secondary" id="limpar" value="Limpar Campos">Limpar</button>                
        </div>	
     </div>
</form>

<?PHP
//fecha a conexão
mysqli_close($con);

?>        
	  </main>
	</div>
  </div>
	  <script src=" js/feather.min.js"></script>
	  <script src="js/dashboard.js"></script>
	</body>
  </html>
