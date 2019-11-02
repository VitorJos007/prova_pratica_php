<?PHP 
include('conexao.php');

extract($_POST);
$query = "insert into cliente (nome, endereco, numero, bairro, cidade, uf, cep, email, cpf) values 
('$nome', '$endereco', '$numero', '$bairro', '$cidade', '$uf', '$cep', '$email', '$cpf')";


$inserir = mysqli_query($con, $query);

if ($inserir) {
	echo "<h1>Registro Inserido com Sucesso!</h1>";
} else {
echo "Não foi possível inserir o Cliente, tente novamente.";
// Exibe dados sobre o erro:
echo "Dados sobre o erro:" . mysqli_error($con);
}
?>
