<form class="form-horizontal" method="post">
<fieldset>

<!-- Form Name -->
<legend>Cadastro de conteúdo</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="idNome">Texto</label>
  <div class="col-md-10">
  <textarea class="form-control" id="conteudo" name="conteudo" type="text" placeholder="Texto"  required="" rows="10"></textarea>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="idConfirmar"></label>
  <div class="col-md-8">
    <button id="idConfirmar" name="idConfirmar" type="submit" class="btn btn-primary">confirmar</button>
    <a href="conteudo/index">Cancelar</a>
  </div>
</div>

</fieldset>
</form>