<div class="container">

<div class="page-header">
<h1>ユーザー一覧</h1>
</div>

<table class="table table-striped">
	
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Email</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Admin</th>
	</tr>
	
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['User']['id'] ?></td>
		<td><?php echo $this->Html->link($user['User']['username'], array('action' => 'edit', $user['User']['id'])) ?></td>
		<td><?php echo $user['User']['email'] ?></td>
		<td><?php echo $this->Time->format($user['User']['created']) ?></td>
		<td><?php echo $this->Time->format($user['User']['modified']) ?></td>
		<td><?php echo $user['User']['admin'] === '1'? 'Admin': '' ?>
	</tr>
	<?php endforeach ?>
	<?php unset($user) ?>

</table>

</div>