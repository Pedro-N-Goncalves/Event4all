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
        <meta name="description" content="Seja bem vindo(a) ao eVent 4 all! Cadastre-se agora para se inscrever e acompanhar todos os eventos de seu interesse!">
        <meta name="keywords" content="event, event4all, contato, mensagem">
        
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
			Contato
        </title>
	</head>

	<body>
        <?php require("../_templates/header.php") ?>
        <div class="contato container-fluid" id="content2">
            <h2 class="titulo-lista">Contato:</h2>
            <div class="row">
                <form id="formcontato">
				
					<div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email" placeholder="exemplo@eventforall.com">
                    </div>
					
					<div class="form-group">
                        <label for="assunto">Assunto</label>
                        <input type="text" class="form-control" id="assunto" placeholder="assunto">
                    </div>
				
                    <div class="form-group">
                        <label for="mensagem">Mensagem</label>
                        <textarea class="form-control" id="mensagem" rows="6" placeholder="mensagem"></textarea>
                    </div>

                    <p id="labelcontato"> </p>
                    
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-share-alt" style="top: 2px"></span>&ensp;Enviar
                    </button>                 
                    <button type="button" class="cancelar btn btn-secondary" onclick="location.href='<?php echo "$page";?>index.php'" >
                        <span class="glyphicon glyphicon-remove" style="top: 2px"></span>&ensp;Cancelar
                    </button>
                </form>
            </div>
        </div>

        <input class="page" type="hidden" value="<?php echo "$page";?>">

		<footer class="footer">
			Projeto Integrado E &copy; 2018
		</footer>
	</body>
</html>