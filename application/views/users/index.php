<?php if(isset($mensagem)){?>
<div class="alert alert-<?php echo $tipoMensagem;?>" role="alert">
	<?php echo $mensagem;?>
</div>
<?php } ?>
<table class="table">
	<thead>
		<tr>
			<th scope="col"><a href="users/add" class="btn btn-primary">Add</a></th>
			<th scope="col">Nome</th>
			<th scope="col">E-Mail</th>
			<th scope="col">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($users) && count($users)){ ?>
			<?php foreach((object)$users as $user){ ?>
				<tr>
					<td scope="row"><?php echo $user['id'];?></td>
					<td><?php echo $user['name'];?></td>
					<td><?php echo $user['email']?></td>
					<td>
						<a href="users/edit/<?php echo $user['id']?>" class="btn btn-secondary">Edit</a>
						<a href="users/delete/<?php echo $user['id']?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php } ?>
		<?php }else{ ?>
		<tr>
			<td colspan="3">Não tenho registros</td>
		</tr>
		<?php } ?>
	</tbody>
</table>