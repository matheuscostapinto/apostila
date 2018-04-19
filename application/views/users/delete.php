<!-- Form Name -->
<form action="users/delete/<?php echo $id?>" method="post">
	<legend>Delete do Usuário</legend>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="idConfirmar"></label>
	  <div class="col-md-8">
		<button id="idConfirmar" name="idConfirmar" type="submit" value="<?php echo $id?>" class="btn btn-primary">confirmar</button>
		<a href="users/index">Cancelar</a>
	  </div>
	</div>
</form>