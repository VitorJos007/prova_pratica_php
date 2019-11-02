<?PHP

$id = $_GET['id'];
// Inclui o arquivo que faz a conexão ao MySQL
include("conexao.php");
// Montamos a consulta SQL para deletar a(s) notícia(s) com ID maior ou igual a três
$query = "DELETE FROM cliente WHERE id = $id";
// Executa a query
$deletar = mysqli_query($con,$query);
if ($deletar) {
echo "<h1>Registro deletado com Sucesso!</h1>";
} else {
echo "Não foi possível deletar";
// Exibe dados sobre o erro:
echo "Dados sobre o erro:" . mysqli_error();
}
?>