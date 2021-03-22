<?php  
    session_start();
    require_once("../../php/conexao_bd.php");

    if (isset($_GET["escolha"])){
        $tema = $_GET["escolha"];
        if ($tema == "Style" || $tema == "Style-Dark"){
            setcookie("tema", $tema, time() + 3600 * 24 * 100, "/");
            header("location:index.php");
            exit;
        }
    }
    include("../_templates/definir_tema.php");
?>

<html>
	<head>
        <!--metadados-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Equipe 05">
        <meta name="description" content="Acompanhe sua agenda e tenha controle de todos os eventos em que se inscreveu!">
        <meta name="keywords" content="event, event4all, agenda, meus, eventos">
        
        <!--bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!--google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
        
        <!--interno-->
        <script type="text/javascript" src="../_js/funcoes.js"></script>
        <link rel="stylesheet" type="text/css" href="../_css/<?php echo $tema;?>.css">
        <link rel="shortcut icon" href="../_templates/icon.png" type="image/x-icon">
        
        <title>
			Meus eventos
        </title>
	</head>

	<body>    
        <?php require("../_templates/header.php") ?>
        <div class="container-fluid" id="content2">
            <?php
                if (isset($_SESSION["cod"])){
                    if (strlen($_SESSION["cod"]) == 6){
            ?>
            <h2 class="titulo-lista">Eventos criados:
                <button id="criaevento" class="btn btn-primary" onclick="location.href='../cadastro_evento/index.php'">
                    <span class="glyphicon glyphicon-plus" style="top:1.5px"></span>&ensp;Criar evento
                </button>
            </h2>
            
            <div class="row">
                <div class="carousel slide" id="eventos" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php require("../../php/buscar_meus_eventos.php"); ?>
                    </div>
                    <?php echo $control; ?>
                </div>
            </div>
            <?php } else { ?>
            <h2 class="titulo-lista">Inscrições:</h2>
            <div class="row">
                <div class="carousel slide" id="inscricoes" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php require("../../php/buscar_meus_eventos.php"); ?>
                    </div>
                    <?php echo $control; ?>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
        
        <input class="page" type="hidden" value="<?php echo "$page";?>">
        <?php require("../_templates/modal_evento.php"); ?>

		<footer class="footer">
			Projeto Integrado E &copy; 2018
		</footer>
	</body>
</html>