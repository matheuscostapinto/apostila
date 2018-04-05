<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<h1 class="text-center"><?php echo $login_text; ?></h1>
			<form method="POST" action="auth/access">
				<div class="form-group">
					<label for="email">Email:</label>
					<input  class="form-control" type="email" id="email" name="email" placeholder="Informe seu e-mail"/>
				</div>
				<div class="form-group">
					<label for="senha">Senha:</label>
					<input  class="form-control" type="password" name="senha" id="senha" placeholder="Informe sua senha"/>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Entrar</button>
			</form>	
		</div>
	</div>
</div>
