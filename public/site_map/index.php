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
        <meta name="description" content="Através do mapa do site, você pode navegar com mais facilidade pelas funções do eVent 4 all">
        <meta name="keywords" content="event, event4all, mapa, site, sitemap">
        
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
			Mapa do site
        </title>
	</head>

	<body>
        <?php require("../_templates/header.php");

        if ($tema == "Style"){
        	$link_color = "color:#000";
        } else { 
        	$link_color = "color:#fff";
        } ?>

        <div class="contato container-fluid" id="content2">
            <h2 class="titulo-lista">Mapa do site:</h2>
			<div class="row">
                <div class="col-md-12">
                    <h4 style="<?php echo $link_color ?>; margin-left:8px"><br>Genérico<br></h4>
                    <ul class="list-unstyled">
                        <li style="<?php echo $link_color ?>">
                            <a style="<?php echo $link_color ?>" href="../index.php">
                                <span class="glyphicon glyphicon-home"></span>&ensp;Home
                            </a>
                        </li>
                        <li style="<?php echo $link_color ?>">
                            <a style="<?php echo $link_color ?>" href="../cadastro_usuario/index.php">
                                <span class="glyphicon glyphicon-user"></span>&ensp;Cadastro
                            </a>
                        </li>
                        <li style="<?php echo $link_color ?>">
                            <a style="<?php echo $link_color ?>" href="../contato/index.php">
                                <span class="glyphicon glyphicon-envelope"></span>&ensp;Contato
                            </a>
                        </li>
                    </ul>
                    <br>
                </div>

                <?php if (isset($_SESSION["cod"])){ 
                    if (strlen($_SESSION["cod"]) == 6){ ?>

				<div class="col-md-12">
					<h4 style="<?php echo $link_color ?>; margin-left:8px">Adiministrador<br></h4>
					<ul class="list-unstyled">
						<li style="<?php echo $link_color ?>">
                            <a style="<?php echo $link_color ?>" href="../agenda/index.php">
                                <span class="glyphicon glyphicon-th-large"></span>&ensp;Meus Eventos
                            </a>
                        </li>
						<li style="<?php echo $link_color ?>">
                            <a style="<?php echo $link_color ?>" href="../cadastro_evento/index.php">
                                <span class="glyphicon glyphicon-plus"></span>&ensp;Criar Evento
                            </a>
                        </li>
                        <li style="<?php echo $link_color ?>">
                            <a style="<?php echo $link_color ?>" href="../cadastro_evento/index.php">
                                <span class="glyphicon glyphicon-cog"></span>&ensp;Alterar Dados
                            </a>
                        </li>
                        <li style="<?php echo $link_color ?>">
                            <a style="<?php echo $link_color ?>" href="../cadastro_evento/index.php">
                                <span class="glyphicon glyphicon-trash"></span>&ensp;Excluir conta
                            </a>
                        </li>
					</ul>
                    <br>
				</div>

                <?php } else { ?>

                <div class="col-md-12">
                    <h4 style="<?php echo $link_color ?>; margin-left:8px">Usuário<br></h4>
                    <ul class="list-unstyled">
                        <li style="<?php echo $link_color ?>">
                            <a style="<?php echo $link_color ?>" href="../agenda/index.php">
                                <span class="glyphicon glyphicon-th-large"></span>&ensp;Meus Eventos
                            </a>
                        </li>
                        <li style="<?php echo $link_color ?>">
                            <a style="<?php echo $link_color ?>" href="../cadastro_evento/index.php">
                                <span class="glyphicon glyphicon-cog"></span>&ensp;Alterar Dados
                            </a>
                        </li>
                        <li style="<?php echo $link_color ?>">
                            <a style="<?php echo $link_color ?>" href="../cadastro_evento/index.php">
                                <span class="glyphicon glyphicon-trash"></span>&ensp;Excluir conta
                            </a>
                        </li>
                    </ul>
                    <br>
                </div>
                <?php } } ?>
			</div>
        </div>

        <input class="page" type="hidden" value="<?php echo "$page";?>">

		<footer class="footer">
			Projeto Integrado E &copy; 2018
		</footer>
	</body>
</html>