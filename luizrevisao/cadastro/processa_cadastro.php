<?php
session_start(); // Inicia a sessão

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar com o banco de dados
    $servername = "localhost"; // ou o endereço do seu servidor de banco de dados
    $username = "root";    // seu nome de usuário do banco de dados
    $password = "";    // sua senha do banco de dados
    $dbname = "cursinho"; // nome do banco de dados

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        $mensagem = "Conexão falhou: " . $conn->connect_error;
    }

    // id, nome, sexo, idade, cep, email, senha, aula, curso, pagamento
    // Coletar dados do formulário
    $nome = $conn->real_escape_string($_POST['nome']);
    $sexo = $conn->real_escape_string($_POST['sexo']);
    $idade = $conn->real_escape_string($_POST['idade']);
    $cep = $conn->real_escape_string($_POST['cep']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $conn->real_escape_string($_POST['senha']); 
    $aula = $conn->real_escape_string($_POST['aula']);
    $curso = $conn->real_escape_string($_POST['curso']);
    $pagamento = $conn->real_escape_string($_POST['pagamento']);

    // Criar o comando SQL para inserir os dados
    $sql = "INSERT INTO usuarios (nome, sexo, idade, cep, email, senha, aula, curso, pagamento) VALUES ('$nome', '$sexo', '$idade', '$cep', '$email', '$senha', '$aula', '$curso', '$pagamento')";

    // Executar o comando SQL
    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao realizar cadastro: " . $conn->error;
    }
    // Fechar conexão
    $conn->close();

    // Redireciona para a página do formulário
    header("Location: cadastro.php");
    exit;
}
?>
