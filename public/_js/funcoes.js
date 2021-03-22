jQuery(document).ready(function($){
    
    // MENU E ACESSIBILIDADE

    $("[data-toggle='tooltip']").tooltip(); 

    $(".toggle-acess, .toggle-login, .toggle-conta, .toggle-delconta, .cancel-ev").tooltip();

    $(".dropdown .navbar-item").mouseout(function(e){
        $(this).tooltip("hide");
    });

    $("#aumentarfonte").click(function(e){
        e.stopPropagation();
        
        if (parseInt($("body *").css("font-size")) < 20)
        {
            $("body *").animate({'font-size' : "+=2" + "px"});
            $(".glyphicon-search").animate({'top' : "-=1" + "px"});
            $(".menufiltro, .menufiltro li").css({"width" : "+=21" + "px"});
            //$('[data-toggle="tooltip"]').animate({'font-size' : "+=2" + "px"});
        }
    });
    
    $("#diminuirfonte").click(function(e){
        e.stopPropagation();
        
        if (parseInt($("body *").css("font-size")) > 14)
        {
            $("body *").animate({'font-size' : "-=2" + "px"});
            $(".glyphicon-search").animate({'top' : "+=1" + "px"});
            $(".menufiltro, .menufiltro li").css({"width" : "-=21" + "px"});;
        }
    });

    $(".navbar-toggle").hover(function(){
        if ($("#menu").css("display") == "none"){
            $(".icon-bar").toggleClass("icon-bar-black");
        }
    });

    $(window).resize(function(){
        if($("#grupo-opcoes").height() > 45){
            $("body").css("padding-top","6.2em");
        } else {
            $("body").css("padding-top","3.2em");
        }
    });

    $(".navbar-toggle").focus(function(){
        $(".icon-bar").addClass("icon-bar-black");
    });

    $(".navbar-toggle").focusout(function(){
        $(".icon-bar").removeClass("icon-bar-black");
    });

    $(document).click(function(){
        $("#menu").collapse("hide");
    });

    $("#busca-eventos").click(function(e){
        e.stopPropagation();
        $('#menu').toggle();
    });
    
    //----------------------------------------------------------------------------

    // LOGIN

    $("#formlogin").submit(function(e){
        e.preventDefault();
        
        var email = $("#emaillogin").val();
        var senha = $("#senhalogin").val();
        var page = $(".page").val();
        
        if (email == ""){
            $("#labellogin").show();
            $("#labellogin").text("Insira seu e-mail!");
        } else if (senha == ""){
            $("#labellogin").show();
            $("#labellogin").text("Insira sua senha!");
        } else {
            $.ajax({
                url: page + "../php/validar_login.php",
                type: "post",
                data: {email : email, senha : senha},
                success: function (result)
                {
                    if(result=="sucesso"){
                        location.href = page + "index.php";
                    } else {
                        $("#labellogin").show();
                        $("#labellogin").text("O e-mail ou  a senha estão incorretos!");
                    }
                }
          });
          return false;
        }
    });

    //----------------------------------------------------------------------------
    
    // CADASTRO DE USUÁRIO
    
    $("#formcadastro").submit(function(e){
        e.preventDefault();
        
        var nome = $("#nome").val();
        var email = $("#email").val();
        var sexo = $("#sexo").val();
        var datanasc = $("#datanasc").val();
        var senha = $("#Senha").val();
        var repetesenha = $("#repetirsenha").val();
        
        if (nome == ""){
            $("#labelcadastro").text("Insira seu nome!");
            $("#labelcadastro").show();
        }
        else if (email == ""){
            $("#labelcadastro").text("Insira um e-mail!");
            $("#labelcadastro").show();
        }
        else if (datanasc == ""){
            $("#labelcadastro").text("Insira sua data de nascimento!");
            $("#labelcadastro").show();
        }
        else if (senha == ""){
            $("#labelcadastro").text("Insira uma senha!");
            $("#labelcadastro").show();
        }
        else if (repetesenha != senha){
            $("#labelcadastro").text("As senhas inseridas não coincidem!");
            $("#labelcadastro").show();
        }
        else 
        {
            $.ajax({
                url: "../../php/validar_cadastro.php",
                type: "post",
                data: {nome : nome, email : email, sexo : sexo, datanasc : datanasc, senha : senha},
                success: function (result)
                {
                    if (result==1){
                        location.href = "../index.php";
                    } else {
                        $("#labelcadastro").show();
                        $("#labelcadastro").text("Houve um problema no sistema. Tente mais tarde!");
                    }
                }
            });
            return false;
        }
    });
    
    //----------------------------------------------------------------------------

    // EVENTOS

    var submit_inscrever = "<span class='glyphicon glyphicon-log-in' style='left:-2px'></span>&ensp;Inscrever-se";
    var submit_desinscrever = "<span class='glyphicon glyphicon-log-out' style='left:-1px'></span>&ensp;Desinscrever-se";
    
    $(".evento").click(function(e){
        var codev = $("input", this).val();
        var page = $(".page").val();

        $.ajax({
            url: page + "../php/buscar_dados_evento.php",
            type: "post",
            data: {codev : codev},
            success: function (result)
            {
                $("#titulo-modal").text($.parseJSON(result)["nome"]);
                $(".modal-evento img").attr("src", page + $.parseJSON(result)["imagem"]);
                $(".descricao").html("<strong>Descrição: </strong> <br>" + $.parseJSON(result)["descricao"]);
                $(".inicio").html("<strong>Início: </strong> <br>" + $.parseJSON(result)["inicio"]);
                $(".termino").html("<strong>Término: </strong> <br>" + $.parseJSON(result)["final"]);
                $(".local").html("<strong>Local do evento: </strong> <br>" + $.parseJSON(result)["local"]);
                $(".realizador").html("<strong>Realizador: </strong> <br>" + $.parseJSON(result)["realizador"]);
                $(".capacidade").html("<strong>Capacidade: </strong> <br>" + $.parseJSON(result)["qtdinscritos"] 
                + " / " + $.parseJSON(result)["capacidade"]);
                $(".modal-evento .cod-ev").val(codev);
                $(".modal-evento .cod-adm").val($.parseJSON(result)["codadm"]);
            }
        });
    });

    $(".modal-evento").on("shown.bs.modal", function(){
        var codUs = $(".cod-us", this).val();
        var codAdm = $(".cod-adm", this).val();
        var codEv = $(".cod-ev", this).val();
        var submit = $(".inscrever", this);
        var page = $(".page").val();
        var infoCapacidade = $(".capacidade", this).text().split(" ");
        var qtdInscritos = infoCapacidade[2];
        var capacidadeMax = infoCapacidade[4];

        if (codUs != codAdm){
            $(".inscricao .edit-ev").hide();
            $(".inscricao .cancel-ev").hide();
        }

        if (codUs != "" && codEv != ""){
            $.ajax({
                url: page + "../php/verificar_inscricao.php",
                type: "post",
                data: {codigoUs : codUs, codigoEv : codEv},
                success: function (result)
                {
                    if (result=="inscrito"){
                        submit.val("Desinscrever-se");
                        submit.html(submit_desinscrever);
                    } else {
                        if (qtdInscritos == capacidadeMax){
                            submit.replaceWith("");
                            $(".labelresult").removeClass("labelresultsucess").addClass("labelresultfail");
                            $(".labelresult").text("No momento, este evento está sem vagas disponíveis!");
                            $(".labelresult").show();
                        } else {
                            submit.val("Inscrever-se");
                            submit.html(submit_inscrever);
                        }
                    }
                }
            });
        }
    });
    
    $(".modal-evento").on("hidden.bs.modal", function(){
        $(".labelresult").hide();
    });

    //----------------------------------------------------------------------------

    // ALTERAÇÃO DE DADOS DE EVENTO

    $(".edit-ev").click(function(e){
        var codEv = $(".cod-ev").val();
        var page = $(".page").val();
        location.href = page + "editar_evento/index.php?codev=" + codEv;
    });

    $("#formeditarev").submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url: "../../php/alterar_dados_evento",
            type: "post",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result)
            {
                if (result=="sucesso"){
                    location.href = "../agenda/index.php";
                } else {
                    $("#labeleditarev").show();
                    $("#labeleditarev").text(result)
                }
            }
        });
        return false;
    });
    
    //----------------------------------------------------------------------------

    // INSCRIÇÃO EM EVENTO
    
    $(".inscricao").submit(function(e){
        e.preventDefault();
        var codUs = $(".cod-us", this).val();
        var codEv = $(".cod-ev", this).val();
        var submit = $(".inscrever", this);
        var page = $(".page").val();
        var infoCapacidade = $(".capacidade").text().split(" ");
        var qtdInscritos = infoCapacidade[2];
        var capacidadeMax = infoCapacidade[4];
        
        if ($(".inscrever", this).val() == "Inscrever-se")
        {
            $.ajax({
                url: page + "../php/validar_inscricao.php",
                type: "post",
                data: {codigoUs : codUs, codigoEv : codEv},
                success: function (result)
                {           
                    if (result=="sucesso")
                    {
                        qtdInscritos++;
                        submit.val("Desinscrever-se");
                        submit.html(submit_desinscrever);
                        $(".labelresult").removeClass("labelresultfail").addClass("labelresultsucess");
                        $(".labelresult").text("Inscrição realizada com sucesso!");
                        $(".labelresult").show();
                        $(".capacidade").html("<strong>Capacidade: </strong> <br>" + qtdInscritos
                        + " / " + capacidadeMax);
                    }
                    else
                    {
                        $(".labelresult").removeClass("labelresultsucess").addClass("labelresultfail");
                        $(".labelresult").text("Houve um problema no sistema. Tente mais tarde!");
                        $(".labelresult").show();
                    }
                }
            });
        } 
        else 
        {
            $.ajax({
                url: page + "../php/cancelar_inscricao.php",
                type: "post",
                data: {codigoUs : codUs, codigoEv : codEv},
                success: function (result)
                {
                    if (result=="sucesso")
                    {
                        qtdInscritos--;
                        submit.val("Inscrever-se");
                        submit.html(submit_inscrever);
                        $(".labelresult").removeClass("labelresultfail").addClass("labelresultsucess");
                        $(".labelresult").text("Inscrição cancelada com sucesso!");
                        $(".labelresult").show();
                        $(".capacidade").html("<strong>Capacidade: </strong> <br>" + qtdInscritos
                        + " / " + capacidadeMax);
                    }
                    else
                    {
                        $(".labelresult").removeClass("labelresultsucess").addClass("labelresultfail");
                        $(".labelresult").text("Houve um problema no sistema. Tente mais tarde!");
                        $(".labelresult").show();
                    }
                }
            });
        }
        return false;
    });

    //----------------------------------------------------------------------------
    
    // CADASTRO DE EVENTO
    
    $("#formcadastroev").submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url: "../../php/validar_cadastro_evento.php",
            type: "post",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result)
            {
                if (result=="sucesso"){
                    location.href = "../agenda/index.php";
                } else {
                    $("#labelcadastroev").show();
                    $("#labelcadastroev").text(result)
                }
            }
        });
        return false;
    });
    
    function imgPreview(input) 
    {
        if (input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function (e){
                $("#img-ev img").replaceWith("<img src='"+e.target.result+"' class='img-rounded'/>");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#select-imagem").change(function(){
        imgPreview(this);
    });

    //----------------------------------------------------------------------------

    // EXCLUSÃO DE EVENTO

    $(".excluir-evento").click(function(e){
        var codev = $(".modal-evento .cod-ev").val();
        var page = $(".page").val();

        $.ajax({
            url: page + "../php/deletar_evento.php",
            type: "post",
            data: {codev : codev},
            success: function (result)
            {
                if (result=="sucesso"){
                    location.href = page + "agenda/index.php";
                }
            }
        });
        return false;
    });

    //----------------------------------------------------------------------------
    
    // CONFIRMAÇÃO DE SENHA
    
    $("#formconfirma").submit(function(e){
        e.preventDefault();
    
        var senha = $("#confirmasenha").val();
        
        if (senha == ""){
            $("#labelvalidacao").show();
            $("#labelvalidacao").text("Insira sua senha!");
        }
        else 
        {
            $.ajax({
                url: "../../php/validar_senha.php",
                type: "post",
                data: {senha : senha},
                success: function (result)
                {			
                    if (result==3){
                        location.href = "../alterar_dados/index.php";
                    } else {
                        $("#labelvalidacao").show();
                        $("#labelvalidacao").text("Senha incorreta! Tente novamente");
                    }
                }
            });
            return false;
        }
    });

    //----------------------------------------------------------------------------
    
    // ALTERAR NOME
    
    $("#formaltnome").submit(function(e){
        e.preventDefault();
        
        var nome = $("#nome").val();
        
        if (nome == ""){
            $("#labelaltnome").show();
            $("#labelaltnome").text("Insira um nome!");
        }
        else
        {
            $.ajax({
                url: "../php/alterar_nome.php",
                type: "post",
                data: {nome : nome},
                success: function (result)
                {
                    if (result==3){
                        $("#modalaltnome").modal("show");
                    } else {
                        $("#labelaltnome").show();
                        $("#labelaltnome").text("Houve um problema no sistema. Tente mais tarde!");
                    }
                }
            });
            return false;
        }
    });
    
    //----------------------------------------------------------------------------
    
    // ALTERAR E-MAIL
    
    $("#formaltemail").submit(function(e){
        e.preventDefault();
    
        var email = $("#email").val();
        var repeteemail = $("#repetiremail").val();
        
        if (email == ""){
            $("#labelaltemail").show();
            $("#labelaltemail").text("Insira um e-mail válido!");
        }
        else if (email != repeteemail){
            $("#labelaltemail").show();
            $("#labelaltemail").text("Os e-mails inseridos não coincidem!");
        }
        else 
        {
            $.ajax({
                url: "../php/alterar_email.php",
                type: "post",
                data: {email : email},
                success: function (result)
                {
                    if (result==3){
                        $("#modalaltemail").modal("show");
                    } else {
                        $("#labelaltemail").show();
                        $("#labelaltemail").text("Houve um problema no sistema. Tente mais tarde!");
                    }
                }
            });
            return false;
        }
    });
    
    //----------------------------------------------------------------------------
    
    // ALTERAR SENHA
    
    $("#formaltsenha").submit(function(e){
        e.preventDefault();
    
        var senha = $("#senha").val();
        var repetesenha = $("#repetirsenha").val();
        
        if (senha == ""){
            $("#labelaltsenha").show();
            $("#labelaltsenha").text("Insira uma senha!");
        }
        else if (repetesenha != senha){
            $("#labelaltsenha").show();
            $("#labelaltsenha").text("As senhas inseridas não coincidem!");
        }
        else 
        {
            $.ajax({
                url: "../php/alterar_senha.php",
                type: "post",
                data: {senha : senha},
                success: function (result)
                {
                    if (result==3){
                        $("#modalaltsenha").modal("show");
                    } else {
                        $("#labelaltsenha").show();
                        $("#labelaltsenha").text("Houve um problema no sistema. Tente mais tarde!");
                    }
                }
            });
            return false;
        }
    });
    
    //----------------------------------------------------------------------------
    
    // CONTATO
    
    $("#formcontato").submit(function(e){
        e.preventDefault();

        var email = $("#email").val();
        var assunto = $("#assunto").val();
        var mensagem = $("#mensagem").val();

        var destino = "event.contatos@gmail.com";

        if (email == ""){
            $("#labelcontato").show();
            $("#labelcontato").text("Insira um e-mail!");
        } else if (assunto == "") {
            $("#labelcontato").show();
            $("#labelcontato").text("Insira um assunto!");
        } else if (mensagem == "") {
            $("#labelcontato").show();
            $("#labelcontato").text("Insira uma mensagem!");
        } else {
            $.ajax({
                url: "../../php/enviar_email.php",
                type: "post",
                data: {email: email, assunto: assunto, mensagem: mensagem, destino: destino},
                success: function (result) {
                    if (result == "sucesso") {
                        $("#labelcontato").removeClass("labelresultfail").addClass("labelresultsucess");
                        $("#labelcontato").text("Mensagem enviada com sucesso!");
                        $("#labelcontato").show();
                    }
                }
            });
        }
    });
});