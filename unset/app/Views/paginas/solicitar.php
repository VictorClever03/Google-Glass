<link rel="stylesheet" type="text/css" href="<?= URL ?>public/css/_css/form.css">
<section id="corpo-full">
    <article id="noticia">
<header id="cabecalho2">        
<hgroup>
    <h3>Fale Conosco > Contato</h3>
    <h1>Formulário de Contato</h1>
    <h2>por Gustavo Guanabara</h2>
    <h3 class="direita">Atualizado em 01/Maio/2013</h3>
</hgroup>
</header>
<form onclick="calc_tot()">

<fieldset id="endereço">
<legend> Endereço do Usuário</legend>
<p><label for="crua"> Logradouro:</label> 
    <input type="text" name="trua" id="crua" size="13"
    maxlength="80" placeholder="Rua, bairro.."/></p>

    <p><label for="cnum"> Número: <input type="number" name="tnum" id="cnum" min="0" max="999999999" /> </label></p>
    <p><label for="cEst"> Estado:</label>
        <select name="tEst" id="cEst">
            <optgroup label="Provincias do sul">
                <option value="ZA" >Zaire</option>
                <option value="UI" >Uige</option>
            </optgroup>
            <optgroup label="Provincias do Norte">
                <option value="MO">Moxico</option>
                <option value="MA">Malanje</option>
            </optgroup>
            <optgroup label="Capital" ><option selected value="LU">Luanda</option> </optgroup>

        </select>
    </p>
    <p><label for="cCity"> Cidade: </label><input type="text" name="tCity" id="cCity" size="20" maxlength="40" placeholder="Sua cidade" list="cidades" />
    <datalist id="cidades">
        <option value="Kilamba"></option>        
        <option value="victor"></option>
        <option value="Miguel Leite"></option>
        <option value="Telma Neto"></option>
        <option value="Rossana Pinto"></option>
    </datalist>
    </p>
</fieldset>
<fieldset id="mensagem">
<legend> Mensagem do Usuário</legend>
   <p><label for="cUrg"> Grau de Urgência:</label> Min<input type="range" name="tUrg" id="cUrg" min="0" max="10" step="2">Máx </p>
   <p><label for="cMen"> Mensagem:</label></p><textarea name="tMen" id="cMen" cols="45" rows="5" placeholder="Escreva a sua mensagem"></textarea>
</fieldset>
<fieldset id="pedido">
<legend> Quero um Google Glass</legend>
    <p><label for="cglass"><input type="checkbox" name="tglass" id="cglass" checked> Gostaria de adquirir um Google Glass quando disponível</label></p>
    <p><label for="cor"> Cor: <input type="color" name="tcor" id="cor" value="#606060"></label></p>
    <p><label for="cQtd"> Quantidade: <input type="number" name="tQtd" id="cQtd" value="0" min="0" max="5"> </label></p>
   <p><label for="cTot"> Preço Total: R$ </label><input type="text" name="tTot" id="cTot" placeholder="Total a Pagar" size="8" readonly> </p>
</fieldset>
</form>
<input type="submit" name="tEnviar" value="Enviar">
</article>
</section>
