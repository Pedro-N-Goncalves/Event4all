<?php  
    if (isset($_GET["dicas"])){
        $dicas = $_GET["dicas"];
        if ($dicas == "on" || $dicas == "off"){
            setcookie("dicas", $dicas, time() + 3600 * 24 * 100, "/");
            header("location:index.php");
            exit;
        }
    }

    if ($_SERVER["PHP_SELF"] == "/event4all/public/index.php"){
        include("_templates/definir_dicas.php");
    } else {
        include("../_templates/definir_dicas.php");
    }
?>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <?php if ($_SERVER["PHP_SELF"] == "/event4all/public/index.php"){
            $page = null;
        } else { 
            $page = "../";
        } ?>

        <a href="<?php echo "$page";?>index.php" class="navbar-brand"
        <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para ir para a página inicial"<?php } ?>>
            <h1 class="nome-site">eVent4all</h1>
        </a>

        <ul class="nav navbar-nav">
            <li>
                <button type="button" 
                    class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#menu">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </li>
        </ul>
    </div>

    <div class="collapse navbar-collapse " id="menu">
        <form id="busca-eventos" class="navbar-form" role="search" action="<?php echo "$page"; ?>buscar_eventos/index.php" method="get">
            <div class="input-group">
                <input type="text" id="busca" name="busca" class="form-control" value="<?php if(isset($_GET['busca'])){echo $_GET['busca'];} ?>" placeholder="Procurar eventos">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit" 
                    <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para fazer a busca"<?php } ?>>
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <ul id="grupo-opcoes" class="nav navbar-nav navbar-left" style="clear:left">

            <?php if (isset($_SESSION["nome"])){ ?>
            <li>
                <a class="navbar-item" href="<?php echo "$page";?>agenda/index.php"
                <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para ir para sua agenda de eventos"<?php } ?>>
                    <span class="glyphicon glyphicon-th-large" style="top:1px"></span>&ensp;Meus eventos
                </a>
            </li>
            <?php } ?>

            <li>
                <a class="navbar-item" href="<?php echo "$page";?>contato/index.php"
                <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para entrar em contato conosco"<?php } ?>>
                    <span class="glyphicon glyphicon-envelope" style="top:2px"></span>&ensp;Contato
                </a>
            </li>

            <li class="dropdown">
                <a id="acessibilidade" class="navbar-item toggle-acess" href="#" role="button" data-toggle="dropdown"
                <?php if ($dicas == "on"){ ?> data-placement="bottom" title="Clique aqui para opções de acessibilidade"<?php } ?>>
                    <span class="glyphicon glyphicon-eye-open" style="top: 2px"></span>&nbsp;Acessibilidade
                </a>

                <div class="menuacess dropdown-menu" style="height:auto" aria-labelledby="acessibilidade">
                    <p class="categoria">Tamanho da fonte</p>

                    <div>
                        <a class="dropdown-item" id="aumentarfonte" href="#" 
                        <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para aumentar o tamanho da fonte"<?php } ?>>A+</a>

                        <a class="dropdown-item" id="diminuirfonte"  href="#" 
                        <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para diminuir o tamanho da fonte"<?php } ?>>A-</a>
                    </div> 
                    
                    <?php if ($tema == "Style"){ ?>
                    <a class="dropdown-item" id="alterartema" href="index.php?escolha=Style-Dark"
                        <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para mudar para o tema escuro"<?php } ?>>
                        <span class="glyphicon glyphicon-adjust" style="top: 2px"></span>&ensp;Tema escuro
                    </a>
                    <?php } else { ?>
                    <a class="dropdown-item" id="alterartema" href="index.php?escolha=Style"
                        <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para mudar para o tema padrão (claro)"<?php } ?>>
                        <span class="glyphicon glyphicon-adjust" style="top: 2px"></span>&ensp;Tema padrão
                    </a>
                    <?php } ?>

                    <?php if ($dicas == "off"){ ?>
                        <a class="dropdown-item" id="dicas" href="index.php?dicas=on"
                        data-toggle="tooltip" data-placement="bottom" title="Clique aqui para ativar as dicas do site">
                            <span class="glyphicon glyphicon-question-sign" style="top: 2px"></span>&ensp;Ativar dicas
                        </a>
                    <?php } else { ?>
                        <a class="dropdown-item" id="dicas" href="index.php?dicas=off"
                         data-toggle="tooltip" data-placement="bottom" title="Clique aqui para desativar as dicas do site">   
                         <span class="glyphicon glyphicon-question-sign" style="top: 2px"></span>&ensp;Desativar dicas
                        </a>
                    <?php } ?>
                </div>
            </li>
            <li>
                <a class="navbar-item" href="<?php echo "$page";?>site_map/index.php"
                <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para ir para o mapa do site"<?php } ?>>
                    <span class="glyphicon glyphicon-map-marker" style="top: 2px"></span>&ensp;Mapa do site
                </a>
            </li>

            <?php if (isset($_SESSION["nome"])){ ?>
            <li class="dropdown">
                <a class="navbar-item toggle-conta" href="#" id="conta" data-toggle="dropdown" aria-haspopup="true"
                <?php if ($dicas == "on"){ ?> data-placement="bottom" title="Clique aqui para exibir as opções da sua conta"<?php } ?>>
                    <span class="glyphicon glyphicon-user" style="top: 2px"></span>&nbsp;Minha conta
                </a>

                <div class="menuconta dropdown-menu" aria-labelledby="menuconta">
                    <a class="dropdown-item" href="<?php echo "$page";?>confirmar_senha/index.php"
                        <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para alterar seus dados cadastrais"<?php } ?>>
                        <span class="glyphicon glyphicon-cog" style="top: 1px"></span>&ensp;Alterar dados
                    </a>
                    <a class="dropdown-item toggle-delconta" href="#" data-toggle="modal" data-target="#modaldelconta"
                        <?php if ($dicas == "on"){ ?> data-placement="bottom" title="Clique aqui para excluir sua conta"<?php } ?>>
                        <span class="glyphicon glyphicon-trash" style="top: 2px"></span>&ensp;Excluir conta
                    </a>
                </div>
            </li>
            <?php } ?>
            
            <li class="dropdown">
                <?php if (!isset($_SESSION["nome"])){ ?>
                <a class="navbar-item toggle-login" href="#" id="login" data-toggle="dropdown" aria-haspopup="true"
                <?php if ($dicas == "on"){ ?> data-placement="bottom" title="Clique aqui para acessar sua conta ou se cadastrar"<?php } ?>>
                    <span class="glyphicon glyphicon-log-in" style="top: 1.5px"></span>&ensp;Entrar
                </a>

                <div class="menulogin dropdown-menu">
                    <form class="px-4 py-3" id="formlogin">
                        <div class="form-group">
                            <label for="emaillogin">E-mail</label>
                            <input type="emaillogin" class="form-control" id="emaillogin" placeholder="nome@exemplo.com" name="emaillogin">
                        </div>

                        <div class="form-group">
                            <label for="senhalogin">Senha</label>
                            <input type="password" class="form-control" id="senhalogin" placeholder="Sua senha" name="senhalogin" maxlength="16">
                        </div>

                        <p id="labellogin" class="labelresultfail"> </p>

                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-log-in" style="top: 1px"></span>&nbsp;&nbsp;Entrar
                        </button>

                        <button type="button" class="cadastro btn btn-secondary" onclick="location.href='<?php echo "$page";?>cadastro_usuario/index.php'">
                            <span class="glyphicon glyphicon-user" style="top: 2px"></span>&ensp;Cadastrar-se
                        </button>
                    </form>
                </div>
                <?php } else { ?>
                    <a class="navbar-item" href="<?php echo "$page";?>../php/logout.php" id="logout" 
                    <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para sair da sua conta"<?php } ?>>
                        <span class="glyphicon glyphicon-log-out" style="top: 1.5px"></span>&ensp;Sair
                    </a>
                <?php } ?>
            </li>
        </ul>
    </div>
</nav>

<div class="modal fade bd-example-modal-sm" id="modaldelconta" tabindex="-1" role="dialog" aria-labelledby="modaldelconta" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#900">
                <h4 class="modal-title text-center">Deletar conta</h4>
            </div>
            <div class="modal-body text-center">
                Deseja mesmo deletar sua conta?
            </div>
            <div class="modal-footer" style="text-align:center">
                <button type="button" class="modal-btn excluir-conta btn btn-secondary" data-dismiss="modal"
                <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para confirmar a exclusão de sua conta"<?php } ?>>Sim
                </button>

                <button type="button" class="modal-btn btn btn-primary" data-dismiss="modal" 
                <?php if ($dicas == "on"){ ?> data-toggle="tooltip" data-placement="bottom" title="Clique aqui para cancelar a operação"<?php } ?>>Não
                </button>
            </div>
        </div>
    </div>
</div>