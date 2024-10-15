<?php
    require_once("verifica.php");
 
    $data=$_REQUEST;
 
    include_once("config.php");
 
    $conexao = db_connect();
 
    extract($data);
   
?>
 
<?php include_once("cabec.php"); ?>
 
    <p>&nbsp;</p>
 
    <h2 align="center">Endereço</h2>
 
   
    <form class="form-inline row justify-content-center col-lg-12" action="usuarioGrava.php" method="post">
       
        <div class="form-group row my-2">
            <label class="col-sm-2 col-form-label text-end">Cep:</label>
            <div class="col-sm-7">
                <input name="cep" class="form-control" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" />
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-sm-2 col-form-label text-end">Rua</label>
            <div class="col-sm-7">
                <input name="rua" class="form-control" type="text" id="rua" size="60" />
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-sm-2 col-form-label text-end">Bairro</label>
            <div class="col-sm-7">
                <input name="bairro" class="form-control" type="text" id="bairro" size="40" />
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-sm-2 col-form-label text-end">Cidade</label>
            <div class="col-sm-7">
                <input name="cidade" class="form-control" type="text" id="cidade" size="40" />
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-sm-2 col-form-label text-end">UF</label>
            <div class="col-sm-7">
                <input name="uf" class="form-control" type="text" id="uf" size="2" />
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-sm-2 col-form-label text-end">IBGE:</label>
            <div class="col-sm-7">
                <input name="ibge" class="form-control" type="text" id="ibge" size="8" />
            </div>
        </div>
       
       
        <div class="col-md-12 my-3" >
            <div class="form-group col-md-11">
                <label class="col-md-6">&nbsp;</label>
                <button type="button" class="btn btn-dark col-md-2" onClick="window.open('usuario.php', '_self')"><?php echo $lng['sair']; ?></button>
                <label class="col-md-1">&nbsp;</label>
                <button type="submit" class="btn btn-dark col-md-2" >Salvar</button>
            </div>
        </div>
    </form>
 
    <p>&nbsp;</p>
 
   
 
<?php include_once("rodape.php"); ?>
 
    <!-- Adicionando Javascript -->
    <script>
   
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }
 
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
       
    function pesquisacep(valor) {
 
        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');
 
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
 
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
 
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
 
                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";
 
                //Cria um elemento javascript.
                var script = document.createElement('script');
 
                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
 
                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);
 
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
 
    </script>