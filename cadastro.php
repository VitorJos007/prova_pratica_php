  <?PHP
  include("conexao.php"); //caminho do arquivo de conexão ao banco de dados
  $sql    = "select count(*) AS TOTAL FROM cliente";
  $res    = mysqli_query($con, $sql); 
  $row    = mysqli_fetch_assoc($res);
  
  ?>
  <!doctype html>
  <html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	  <meta name="generator" content="Jekyll v3.8.5">
	  <title>Cadastro</title>
  
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
            
         <!-- Adicionando Javascript -->
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
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                
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
			$("#cpf").mask("000.000.000-00");
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
		<form id="cadastro" name="cadastro" action="add.php" method="post" onsubmit="return validaCampo(); return false;">	 
		 <!-- area de campos do form -->	  
		 <hr />	 
		  <div class="row">	   
               <div class="form-group col-md-1">	     
                <label>ID</label>	  
                <input type="text" class="form-control" name="id" id="id" disabled>	
               </div>	
                        
              <div class="form-group col-md-4">
               <label>Nome</label>
               <input type="text" required class="form-control" name="nome" id="nome">	
              </div>
                      
              <div class="form-group col-md-3">	      
                <label>CPF</label>	      
                <input type="text" required class="cpf form-control" placeholder="Ex.: 000.000.000-00" name="cpf" id="cpf" >	  
              </div>                    
               	 
	    </div>	  
						
		<div class="row">
        
        	<div class="form-group col-md-4">	
                <label>Email</label>	
                <input type="text" class="form-control" name="email" id="email">
             </div>
             
			<div class="form-group col-md-5">
				<label>Endereço</label>	  
                <input type="text" class="form-control" name="endereco" id="endereco">	
			</div>
											  
	       <div class="form-group col-md-2">	
			   <label>Numero</label>
			   <input type="text" class="form-control" name="numero" id="numero">	
           </div>	    
        </div> 	
           
        <div class="row">
                   
           <div class="form-group col-md-3">	
			   <label>Bairro</label>
			   <input type="text" class="form-control" name="bairro" id="bairro">	
           </div>
           
            <div class="form-group col-md-3">	
               <label>Cidade</label>
               <input type="text" class="form-control" name="cidade" id="cidade">
              </div>
						
	     <div class="form-group col-md-2">	 
			 <label>CEP</label>	
		     <input type="text" class="form-control" name="cep" id="cep" size="10" maxlength="9">	
	    </div>												  	
                                                                            
        <div class="form-group col-md-2">	      
             <label>UF</label>	      
             <input type="text" class="form-control" name="uf" id="uf">	  
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
