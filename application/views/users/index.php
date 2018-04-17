<table class="table">
	<thead>
		<tr>
			<th scope="col">#</th>
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
						<a href="users/edit/<?php echo $user['id']?>">Edit</a>
						<a href="users/delete/<?php echo $user['id']?>">Delete</a>
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