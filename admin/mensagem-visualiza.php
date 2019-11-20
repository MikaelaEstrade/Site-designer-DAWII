<?php
include_once 'classes/autoload.php';

Login::checkAuth();
//Verifica se veio tudo preenchido do formulário
if (isset($_GET['id']) && $_GET['id'] != "") {

    $mensagem = new Mensagem();
    $mensagem->setId($_GET['id']);

    $mensagemDao = new MensagemDao();
    $msgData = $mensagemDao->selectById($mensagem);
    
}
?>

<html>
    <head><title> MARKAELA </title>
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="assets/js/script.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="sortcut icon" href="assets/img/icon.ico" type="image/x-icon"/>
        <meta charset="utf-8">
    </head>
    <body>
    <header>
        <nav id="horizontal">
            <ul>
                <li><a href="home.php"><img src="assets/img/logo.png" width="150x"> </a></li>
                <li style="float:right"><a class="active" href="login.php">Sair</a></li>
                <li style="float:right"><a class="active" href="usuario-lista.php">Minha conta</a></li>
            </ul>
        </nav>

        <nav id="vertical"> 
            <ul>
                 <li><a href="home.php">Home</a></li>
                <li><a href="portfolio-lista.php">Portfólio</a></li>
                <li><a href="servico-lista.php.">Serviços</a></li>
                <li><a href="curriculo-lista.php">Currículo</a></li>
                <li><a href="mensagem-lista.php">Mensagens</a></li>
            </ul>
        </nav>
    </header> 
        
    <section id="content">
                <div class="container">
                    <div  id="mensagem">
                            <h3><?php echo $msgData->getAssunto(); ?></h3>
                            <h4><?php echo $msgData->getEmail(); ?>   "<?php echo $msgData->getTelefone(); ?>" </h4>
                            <p>"<?php echo $msgData->getTexto(); ?>" </p>
                         <button onclick="confirm('Deseja exclir este registro?') ? window.location='mensagem-deleta-ok.php?id=<?php echo $msgData->getId(); ?>' : stop = false;">Excluir</button>
                    </div>
            </div>

    </section>

    <footer>
        
    </footer>
    </body>
</html>