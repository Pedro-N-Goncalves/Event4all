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

<?php  
    if (isset($_GET["codev"])){
        $cod = $_GET["codev"];

        $query_dados = "SELECT * 
                          FROM eventos 
                          WHERE CodEv = '$cod'"; 

        $dados = mysqli_query($conexao,$query_dados);
        $evento = mysqli_fetch_assoc($dados);

        $codigoev = $evento["CodEv"];
        $nome = $evento["NomeEv"];
        $descricao = $evento["DescEv"];
        $Realizador = $evento["RealizadorEv"];
        $Local = $evento["LocalEv"];
        $Inicio = date_format(new datetime($evento["InicioEv"]), "Y-m-d\TH:i:s");
        $Final = date_format(new datetime($evento["FinalEv"]), "Y-m-d\TH:i:s");
        $Capacidade = $evento["CapacidadeEv"];
        $imagem = $evento["ImagemEv"];
    }
?>

<html>
	<head>
        <!--metadados-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Equipe 05">
        <meta name="description" content="Crie novos eventos com facilidade! (administradores)">
        <meta name="keywords" content="event, event4all, cadastrar, eventos, cadastro">
        
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
			Editar evento
        </title>
	</head>

	<body>
        <?php require("../_templates/header.php") ?>
        <div class="cadastrar container-fluid" id="content2">
            <h2 class="titulo-lista">Editar evento:</h2>
            <div class="row">
                <form id="formeditarev" enctype="multipart/form-data">
                    <div class="form-row">
                        <input type="hidden" name="codev" id="codev" value="<?php echo "$codigoev"; ?>">
                        <div class="left col-md-6 col-sm-6">
                            <label for="nomeev">Nome do evento</label>
                            <input type="text" class="form-control" id="nomeev" name="nomeev" placeholder="Insira um nome para o evento" value="<?php echo "$nome"; ?>">
                        </div>      

                        <div class="right col-md-6 col-sm-6">
                            <label for="realizador">Realizador do evento</label>
                            <input type="text" class="form-control" id="realizador" name="realizador" placeholder="Insira o nome do realizador" value="<?php echo "$Realizador"; ?>">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="left col-md-6 col-sm-6">
                            <label for="datainicio">Data e hora de Início</label>
                            <input type="datetime-local" class="form-control" id="datainicio" name="datainicio" 
                            value="<?php echo "$Inicio" ?>">
                        </div>      
                    
                        <div class="right col-md-6 col-sm-6">
                            <label for="datafim">Data e hora de Termino</label>
                            <input type="datetime-local" class="form-control" id="datafim" name="datafim" 
                            value="<?php echo "$Final" ?>">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="left col-md-6 col-sm-6">
                            <label for="local">Local do evento</label>
                            <input type="text" class="form-control" id="local" name="local" placeholder="Insira o local onde ocorrerá o evento" value="<?php echo "$Local"; ?>">
                        </div>    
                    
                        <div class="right col-md-6 col-sm-6">
                            <label for="capacidade">Capacidade máxima</label>
                            <input type="tel" class="form-control" id="capacidade" name="capacidade" placeholder="Insira o número máximo de pessoas do evento" maxlength="4" value="<?php echo "$Capacidade"; ?>">
                        </div>
                    </div>
                    
                    <div id="img-ev" class="form-row">
                        <div class="left col-md-12 col-sm-12">
                            <label>Imagem para o evento</label><br>
                            <label for="select-imagem" class="btn-secondary" id="label-imagem">
                                <span class="glyphicon glyphicon-camera" style="top:1.5px"></span>&ensp;Escolher imagem &#187;
                            </label>
                            <input type="file" id="select-imagem" name="select-imagem" accept="image/*">
                        </div> 
                        <img src="<?php echo "$page$imagem"; ?>" class="img-rounded"/>   
                    </div>
    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="descricao" style="margin-top:1em">Descrição do evento</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Insira uma descrição para o evento"><?php echo "$descricao"; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom:0.5em">
                        <p id="labeleditarev" class="labelresultfail"></p>
                    </div>
            
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-ok" style="left:-2px"></span>&ensp;Salvar alterações
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