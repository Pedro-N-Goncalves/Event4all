<?php  
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
        <meta name="description" content="Cadastre-se agora para se inscrever e acompanhar todos os eventos de seu interesse!">
        <meta name="keywords" content="event, event4all, cadastro, cadastrar, usuario">
        
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
			Cadastro de usuário
        </title>
	</head>

	<body>
        <?php require("../_templates/header.php") ?>
        <div class="cadastrar container-fluid" id="content2">
            <h2 class="titulo-lista">Cadastro:</h2>
            <div class="row">
                <form id="formcadastro">  
                    <div class="form-row">
                        <div class="left col-md-6 col-sm-6"> 
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira seu nome completo">
                        </div>      

                        <div class="right col-md-6 col-sm-6">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="left col-md-6 col-sm-6"> 
                            <label for="sexo">Sexo</label>
                            <select class="form-control" id="sexo" name="sexo">
                                <option>Masculino</option>
                                <option>Feminino</option>
                            </select>
                        </div>      
                    
                        <div class="right col-md-6 col-sm-6">
                            <label for="datanasc">Data de nascimento</label>
                            <input type="date" class="form-control" id="datanasc" name="datanasc">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="left col-md-6 col-sm-6"> 
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="Senha" name="senha" placeholder="Insira uma senha entre 8 e 16 caracteres">
                        </div>      
                    
                        <div class="right col-md-6 col-sm-6">
                            <label for="repetirsenha">Repetir senha</label>
                            <input type="password" class="form-control" id="repetirsenha" name="repetirsenha" placeholder="Repita a senha">
                        </div>
                    </div>

                    <p id="labelcadastro" style="clear:both"></p>
            
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-ok" style="left:-2px"></span>&ensp;Cadastrar
                    </button>
                    <button type="button" class="cancelar btn btn-secondary" onclick="location.href='../index.php'">
                        <span class="glyphicon glyphicon-remove" style="top:2px"></span>&ensp;Cancelar
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