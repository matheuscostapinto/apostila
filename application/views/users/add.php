<form class="form-horizontal" method="post">
<fieldset>

<!-- Form Name -->
<legend>Cadastro do Usuário</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="idNome">Nome</label>
  <div class="col-md-5">
  <input id="idNome" name="idNome" type="text" placeholder="Nome do usuário" class="form-control input-md" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="idUsuario">Usuário</label>  
  <div class="col-md-5">
  <input id="idUsuario" name="idUsuario" type="text" placeholder="Login do usuario" class="form-control input-md" required="">
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="idSenha">Senha</label>
  <div class="col-md-5">
    <input id="idSenha" name="idSenha" type="password" placeholder="Digite a senha" class="form-control input-md" required="">
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="idConfirmar"></label>
  <div class="col-md-8">
    <button id="idConfirmar" name="idConfirmar" type="submit" class="btn btn-primary">confirmar</button>
    <a href="users/index">Cancelar</a>
  </div>
</div>

</fieldset>
</form>