<?php
	$key = "PortalZ";

    $data=$_REQUEST;

    include_once("config.php");

    $conexao = db_connect();

    extract($data);
	
    $nome = $edtNome;
    $email = $edtMail;
	$senha = base64_encode($edtSenha . '::' . $key);
	$status = "A";
    $tipo = $edtTipo;
	//$senha = $edtSenha;

	$resultado = "ERRO";
	
	$sql = "INSERT INTO usuario (usumail, ususenha, usunome, usustatus, usutipo) VALUES ('$email', '$senha', '$nome', '$status', '$tipo')";

    $comando = $conexao->prepare($sql);


    $comando->execute();

    header('location: .');
?>