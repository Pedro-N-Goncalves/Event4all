<?php  
	require_once("conexao_bd.php"); 

	if (isset($_POST["codev"])){
		$cod = $_POST["codev"];

	    $query_dados = "SELECT * 
	                      FROM eventos 
	                      WHERE CodEv = '$cod'"; 

	    $query_qtdinscritos = "SELECT COUNT(CodUs) 
                            AS qtdInscritos 
                            FROM eventos_usuario
                            WHERE CodEv = '$cod'";

		$dados = mysqli_query($conexao,$query_dados);
	    $qtdResult = mysqli_query($conexao,$query_qtdinscritos);
	    $linha = mysqli_fetch_assoc($qtdResult);
	    $qtd_Inscritos = $linha["qtdInscritos"];

	    $evento = mysqli_fetch_assoc($dados);

		$codigoev = $evento["CodEv"];
		$codadm = $evento["CodAdm"];
        $nome = $evento["NomeEv"];
        $descricao = $evento["DescEv"];
        $Realizador = $evento["RealizadorEv"];
        $Local = $evento["LocalEv"];
        $Inicio = new datetime($evento["InicioEv"]);
        $Final = new datetime($evento["FinalEv"]);
        $Capacidade = $evento["CapacidadeEv"];
        $imagem = $evento["ImagemEv"];

		$dados_evento = array(
			"codigo" => $codigoev,
			"codadm" => $codadm,
			"nome" => $nome,
			"descricao" => $descricao,
			"realizador" => $Realizador,
			"local" => $Local,
			"inicio" => $Inicio->format('d/m/Y - H:i'),
			"final" => $Final->format('d/m/Y - H:i'),
			"capacidade" => $Capacidade,
			"imagem" => $imagem,
			"qtdinscritos" => $qtd_Inscritos
		);

		echo json_encode($dados_evento);
	}
?>