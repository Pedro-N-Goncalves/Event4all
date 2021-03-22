<?php  
    session_start();
    require_once("../php/conexao_bd.php");

    if (isset($_GET["escolha"])){
        $tema = $_GET["escolha"];
        if ($tema == "Style" || $tema == "Style-Dark"){
            setcookie("tema", $tema, time() + 3600 * 24 * 100, "/");
            header("location:index.php");
            exit;
        }
    }
    include("_templates/definir_tema.php");
?>

<html>
    <head>
        <!--metadados-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Equipe 05">
        <meta name="description" content="Seja bem vindo(a) ao eVent 4 all! Cadastre-se agora para se inscrever e acompanhar todos os eventos de seu interesse!">
        <meta name="keywords" content="event, eventos, event4all">
        
        <!--bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!--google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
        
        <!--interno-->
        <script type="text/javascript" src="_js/funcoes.js"></script>
        <link rel="stylesheet" type="text/css" href="_css/<?php echo $tema;?>.css">
        <link rel="shortcut icon" href="_templates/icon.png" type="image/x-icon">
        
        <title>
			Home | eVent 4 all
        </title>
	</head>

	<body>
        <?php require("_templates/header.php") ?>    
        <div class="jumbotron">
            <div class="container" id="inicio">
                <?php if (isset($_SESSION["nome"])){ ?>
                <h2 class="titulo">Bem-vindo(a), <?php echo $_SESSION["nome"]?>!</h2>
                <p class="intro">Comece a acompanhar e se inscrever em quaisquer eventos de sua preferência agora mesmo!</p>
                <?php } else { ?>
                <h2 class="titulo">Bem-vindo(a) ao eVent!</h2>
                <p class="intro">Basta fazer login ou criar uma conta para começar a acompanhar e se inscrever em diversos eventos!</p>
                <?php } ?>
            </div>
        </div>

        <div class="container-fluid" id="content1">
            <h2 class="titulo-lista">Próximos eventos</h2>
            <div class="row">
                <div class="carousel slide" data-interval="false" id="eventosproximos">
                    <div class="carousel-inner">
                        <?php require("../php/buscar_eventos_proximos.php"); ?>  
                    </div>
                    <?php echo $control; ?>
                </div>
            </div>
        </div>
        
        <div class="container-fluid" id="content1">
            <h2 class="titulo-lista">Eventos realizados</h2>
            <div class="row">
                <div class="carousel slide" data-interval="false" id="eventosrealizados">
                    <div class="carousel-inner">
                        <?php require("../php/buscar_eventos_realizados.php"); ?>  
                    </div>   
                    <?php echo $control; ?>
                </div>
            </div>
        </div>
        
        <input class="page" type="hidden" value="<?php echo "$page";?>">
        <?php require("_templates/modal_evento.php"); ?>

		<footer class="footer">
			Projeto Integrado E &copy; 2018
		</footer>
	</body>
</html>

<?php mysqli_close($conexao); ?>