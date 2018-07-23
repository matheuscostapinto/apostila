<form class="form-horizontal" method="post">
<fieldset>

<!-- Form Name -->
<legend>Update do Usuário</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="idNome">Conteudo</label>
  <div class="col-md-10">
  <textarea id="conteudo" name="conteudo" type="text" placeholder="Nome do usuário" class="form-control input-md" required rows="10" /><?php echo $conteudo; ?></textarea>
  
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="idConfirmar"></label>
  <div class="col-md-8">
    <button id="idConfirmar" name="idConfirmar" class="btn btn-primary" value="<?php echo $id;?>">confirmar</button>
    <a href="conteudo/index">Cancelar</a>
  </div>
</div>

</fieldset>
</form>