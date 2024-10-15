<?php

	$cep = preg_replace("/[^0-9]/", "", $cep);
	
	$url = "viacep.com.br/ws/" . $cep . "/json/";


	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);

	$headers = array(
	  'Authorization: BT',
	  'Accept: application/json'
	);

	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($curl);
	
	$dados = json_decode( $response, true );
	
	echo '{"cep":"' . $dados['cep'] . '"';
	echo ',"logradouro":"' . $dados['logradouro'] . '"';
	echo ',"complemento":"' . $dados['complemento'] . '"';
	echo ',"bairro":"' . $dados['bairro'] . '"';
	echo ',"localidade":"' . $dados['localidade'] . '"';
	echo ',"uf":"' . $dados['uf'] . '"';
	echo ',"ibge":"' . $dados['ibge'] . '"';
	echo '}';

?>

<?php include_once("cabec.php"); ?>

<div></div>
 <div>
	<p>&nbsp;</p>

	<h2 align="center">Dados do Usuário</h2>

	
	<form class="form-inline row justify-content-center col-lg-12" action="usuarioGrava.php" method="post">
		
		<div class="form-group col-sm-12 col-lg-10">
			<div class="control-label col-sm-11">
				<p class="help-block" align="right"><h11>*</h11> Campo Obrigatório </p>
			</div>
		</div>
		
		<div class="form-group row my-2">
			<label for="edtCEP" class="col-sm-2 col-form-label text-end">CEP: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="edtCEP" name="edtCEP" placeholder="cep do usuário" >
			</div>
	  	</div>	
		
		<div class="form-group row my-2">
			<label for="edtRua" class="col-sm-2 col-form-label text-end">Logradouro: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="edtRua" name="edtRua" placeholder="Logradouro do Usuário">
				  	</div>
				
		  <div class="form-group row my-2">
			<label for="edtComplemento" class="col-sm-2 col-form-label text-end">Complemento: &nbsp;</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="edtComplemento" name="edtComplemento" placeholder="Complemento do endereço">
				  	</div>
	  	</div>
		
		
		<div class="form-group row my-2">
			<label for="edtBairro" class="col-sm-2 col-form-label text-end">Bairro: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="edtBairro" name="edtBairro" placeholder="Bairro do Usuário" value="$dados['bairro']">
			</div>
	  	</div>
		
		<div class="form-group row my-2">
			<label for="edtUF" class="col-sm-2 col-form-label text-end">UF: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<select required="" id="edtUF" name="edtUF" class="form-control col-md-8" >
					<option value="AC">Acre (AC)</option>
					<option value="AL">Alagoas (AL)</option>
					<option value="AP">Amapá (AP)</option>
					<option value="AM">Amazonas (AM)</option>
					<option value="BA">Bahia (BA)</option>
					<option value="CE">Ceará (CE)</option>
					<option value="DF">Distrito Federal (DF)</option>
					<option value="ES">Espírito Santo (ES)</option>
					<option value="GO">Goiás (GO)</option>
					<option value="MA">Maranhão (MA)</option>
					<option value="MT">Mato Grosso (MT)</option>
					<option value="MS">Mato Grosso do Sul (MS)</option>
					<option value="MG">Minas Gerais (MG)</option>
					<option value="PA">Pará (PA)</option>
					<option value="PB">Paraíba (PB)</option>
					<option value="PR">Paraná (PR)</option>
					<option value="PE">Pernambuco (PE)</option>
					<option value="PI">Piauí (PI)</option>
					<option value="RJ">Rio de Janeiro (RJ)</option>
					<option value="RN">Rio Grande do Norte (RN)</option>
					<option value="RS">Rio Grande do Sul (RS)</option>
					<option value="RO">Rondônia (RO)</option>
					<option value="RR">Roraima (RR)</option>
					<option value="SC">Santa Catarina (SC)</option>
					<option value="SP">São Paulo (SP)</option>
					<option value="SE">Sergipe (SE)</option>
					<option value="TO">Tocantins (TO)</option>
				</select>
			</div>
	  	</div>

		  <div class="form-group row my-2">
			<label for="edtIBGE" class="col-sm-2 col-form-label text-end">IBGE: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="edtIBGE" name="edtIBGE" placeholder="IBGE do usuário" >
			</div>
	  	</div>	
		
		
		<div class="col-md-12 my-3" >
			<div class="form-group col-md-11">
				<label class="col-md-6">&nbsp;</label>
				<button type="button" class="btn btn-dark col-md-2" onClick="window.open('usuario.php', '_self')">Sair</button>
				<label class="col-md-1">&nbsp;</label>
				<button type="submit" class="btn btn-dark col-md-2" <?php if( $op == "C" ) echo "disabled" ?> >Salvar</button>
			</div>
		</div>
	</form>

	<p>&nbsp;</p>
</div>
	

<?php include_once("rodape.php"); ?>