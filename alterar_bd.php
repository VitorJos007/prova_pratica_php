<?PHP
include('conexao.php');

$nome_novo=$_POST["new_nome"];
$endereco_novo=$_POST["new_endereco"];
$numero_novo=$_POST["new_numero"];
$bairro_novo=$_POST["new_bairro"];
$cidade_novo=$_POST["new_cidade"];
$uf_novo=$_POST["new_uf"];
$cep_novo=$_POST["new_cep"];
$email_novo=$_POST["new_email"];
$cpf_novo=$_POST["new_cpf"];
$id =$_GET['id'];



$sql = "UPDATE cliente SET nome='$nome_novo', endereco='$endereco_novo', numero='$numero_novo', bairro='$bairro_novo', cidade='$cidade_novo', uf='$uf_novo', cep='$cep_novo', email='$email_novo', cpf='$cpf_novo' 
WHERE id='$id'";

$res = mysqli_query($con, $sql) or die ("Não foi possível relizar a alteração");

echo "<h1>Registro Alterado com Sucesso!</h1>";
?>