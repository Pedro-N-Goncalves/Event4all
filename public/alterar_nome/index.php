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
        <meta name="description" content="Altere seu nome de usuário com facilidade!">
        <meta name="keywords" content="event, event4all, alterar, nome">
        
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
			Alterar nome
        </title>
	</head>

	<body>      
        <?php require("../_templates/header.php") ?>
        <div class="cadastrar container-fluid" id="content2">
            <h2 class="titulo-lista">Alterar nome:</h2>
            <div class="row">
                <form id="formaltnome">  
                    <div class="form-row">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" aria-describedby="nomeHelp" placeholder="Insira o nome desejado" />
                    </div>
					<br>
                    <p id="labelaltnome"> </p>
                    
                    <button type="submit" class="btn btn-primary">Alterar</button>          
                    <input type="button" class="cancelar btn btn-secondary" value="Cancelar" onclick="window.location.href='../alterar_dados/index.php'" />
                </form>             
            </div>
        </div>
        
        <div class="modal fade bd-example-modal-sm" id="modalaltnome" tabindex="-1" role="dialog" aria-labelledby="modalaltnome" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center">Alteração concluida</h4>
                    </div>
                    <div class="modal-body text-center">
                        Nome alterado com sucesso!
                    </div>
                    <div class="modal-footer" style="text-align:center">
                        <button type="button" id="ok" class="btn btn-primary" onclick="window.location.href='../alterar_dados/index.php'" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <input class="page" type="hidden" value="<?php echo "$page";?>">

		<footer class="footer">
			Projeto Integrado E &copy; 2018
		</footer>
	</body>
</html>