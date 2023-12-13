<?php
session_start(); // Inicia a sessão PHP, o que é necessário para utilizar variáveis de sessão.

$erro = ""; // Inicializa a variável de erro como uma string vazia.

// Verifica se o método de requisição é POST, o que normalmente indica que o formulário foi enviado.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos nome, email ou senha estão vazios.
    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
        $erro = "Por favor, preencha todos os campos."; // Define a mensagem de erro se algum campo estiver vazio.
    } else {
        require_once "processa_cadastro.php"; // Inclui o arquivo que processa o cadastro se todos os campos estiverem preenchidos.
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css"> <!-- Link para o arquivo CSS externo -->
    <title>Cadastro</title>
</head>
<body>

<div class="logo"><img src="img/Logotipo Nome.png"></div>
<div class="nav">
<nav>
     <ul>
        <li>
            <a href="https://liviafernand.github.io/atividade5/page">Sobre nós</a>
        </li>
        <li>
            <a href="https://liviafernand.github.io/atividade5/">Promoções</a>
        </li>
        <li>
            <a href="https://liviafernand.github.io/atividade5/cursos">Cursos</a>
        </li>
    </ul>
</nav>
</div>

<div class="card">
    <h1>Cadastro de Usuário</h1>
    
    <!-- Formulário de cadastro. O action está configurado para enviar os dados para a mesma página. -->
    <table class="tabela">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <!-- Campos de nome, e-mail e senha -->
        <tr>
        <label for="nome">Nome:</label>
        <br>
        <input type="text" id="nome" name="nome" required>
        </tr>
        <tr>
        <br>
        <label for="cep">Cep:</label>
        <br>
        <input type="number" id="cep" name="cep" required>
        <br>
        </tr>
        <tr>
        <br>
        <label for="idade">Idade:</label>
        <br>
        <input type="number" id="idade" name="idade" required>
        <br>
        </tr>
        <tr>    
        <br>
        <label for="sexo">Sexo:</label>
        <br><br>
        <input type="radio" id="sexo" name="sexo" value="Masculino">Masculino
        <br><br>
        <input type="radio" id="sexo" name="sexo" value="Feminino">Feminino
        <br>
        </tr>
        <tr>
        <br>
        <label for="email">E-mail:</label>
        <br>
        <input type="email" id="email" name="email" required>
        <br>
        </tr>
        <tr>
        <br>
        <label for="senha">Senha:</label>
        <br>
        <input type="password" id="senha" name="senha" required>
        </tr>
        <br><br>
        <tr>
        <label class="curso" for="aula">TIPO DE CURSO:</label>
        <br><br>
        <input type="radio" id="aula" name="aula" value="Presencial">Presencial
        <br><br>
        <input type="radio" id="aula" name="aula" value="Presencial">EAD (Desconto de 10%)
        <br><br>
        </tr>
        <tr>
        <br>
        <label for="curso">CURSO DESEJADO:</label>
        <br><br>
        <input type="checkbox" id="curso" name="curso" value="Desenvolvimento Web">Desenvolvimento Web
        <br><br>
        <input type="checkbox" id="curso" name="curso" value="Informática">Informática
        <br><br>
        <input type="checkbox" id="curso" name="curso" value="Computação em nuvem">Computação em nuvem
        <br><br>
        <input type="checkbox" id="curso" name="curso" value="Python">Python
        <br><br>
        <input type="checkbox" id="curso" name="curso" value="Instalação e manutenção de microcomputadores">Instalação e Manutenção de Microcomputadores
        <br><br><br>
        </tr>
        <tr>
        <label for="pagamento">MÉTODO DE PAGAMENTO:</label>
        <br><br>
        <input type="radio" id="pagamento" name="pagamento" value="Cartão Débito ou Crédito">Cartão Débito ou Crédito
        <br><br>
        <input type="radio" id="pagamento" name="pagamento" value="Boleto">Boleto
        <br><br>
        <input type="radio" id="pagamento" name="pagamento" value="Pix Débito ou Crédito">Pix Débito ou Crédito
        <br><br>
        </tr>
        <tr>
        <br>
        <input type="submit" value="Cadastrar"> <!-- Botão de envio do formulário -->
        </tr>
    </form>
    </table>
    <br>
    <!-- Link para visualizar cadastros -->
    <a href="visualizar_cadastros.php" class="btn">Visualizar Cadastros</a>
</div>

    <footer>
        <a href="https://www.instagram.com/" target="_blank">
            <img src="img/it.png"></img>
        <p>Instagram</p>
        </a>
        <a href="https://github.com/" target="_blank">
            <img src="img/git.png"></img>
            <p>Github</p>
        </a>
        <a href="https://www.youtube.com/watch?v=zBLmrsiAyFc" target="_blank">
            <img src="img/yt.png"></img>
            <p>Youtube</p>
        </a>
    </footer>
    
    <?php 
        // Verifica se há uma mensagem de erro para exibir.
        if (!empty($erro)): ?>
            <div class="mensagem erro">
                <?php echo $erro; // Exibe a mensagem de erro ?>
            </div>
        <?php 
        // Verifica se existe uma mensagem na sessão e se ela não está vazia.
        elseif (isset($_SESSION['mensagem']) && !empty($_SESSION['mensagem'])): ?>
            <div class="mensagem">
                <?php 
                echo $_SESSION['mensagem']; // Exibe a mensagem da sessão.
                unset($_SESSION['mensagem']); // Limpa a mensagem da sessão.
                ?>
            </div>

<?php endif; ?>


</body>
</html>
