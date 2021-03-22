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
        <meta name="description" content="Altere seus dados cadastrais com facilidade!">
        <meta name="keywords" content="event, event4all, alterar, dados, cadastro">
        
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
			Alterar dados
        </title>
	</head>

	<body>   
        <?php require("../_templates/header.php") ?>
        <div class="cadastrar container-fluid" id="content2">
            <h2 class="titulo-lista">Alterar dados:</h2>
            <div class="row">
                <form id="formdados">  
                    <div class="form-row">
                        <div class="left col-md-12 col-sm-12">
                            <label for="nome">Nome: <?php echo $_SESSION["nome"] ?></label>
                            <div class="form-row">
                                <input type="button" class="btn btn-primary" value="Alterar nome" onclick="location.href='../alterar_nome/index.php'" />
                            </div>
                            <br>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="left col-md-12 col-sm-12">
                            <label for="email">E-mail: <?php echo $_SESSION["email"] ?></label>
                            <div class="form-row">
                                <input type="button" class="btn btn-primary" value="Alterar e-mail" onclick="location.href='../alterar_email/index.php'" />
                            </div>
                            <br>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="left col-md-12 col-sm-12">
                            <label for="senha">Senha: </label>
                            <div class="form-row">
                                <input type="button" class="btn btn-primary" value="Alterar senha" onclick="location.href='../alterar_senha/index.php'" />
                            </div>
                            <br>
                        </div>
                    </div>
                    <p id="labelaltdados"> </p>
                    
                    <input type="button" class="cancelar btn btn-secondary" value="Cancelar" onclick="location.href='../index.php'" />
                </form>             
            </div>
        </div>

        <input class="page" type="hidden" value="<?php echo "$page";?>">

		<footer class="footer">
			Projeto Integrado E &copy; 2018
		</footer>
	</body>
</html>