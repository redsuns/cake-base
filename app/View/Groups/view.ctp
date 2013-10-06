<div class="main">
    <div class="container">

        <div class="row">
            <div class="span12">
                <div class="breadcrumb">
                    <?php echo $this->Html->link('Início', '/'); ?>
                    <?php echo $this->Html->link('Grupos/Perfis', '/groups'); ?>
                    Detalhes
                </div>
                <hr class="hr">
            </div>
        </div>
        <br/>
        <div class="span2">
            <h3>Ações</h3>
            <ul>
                <li><?php echo $this->Html->link('Editar Grupo', array('action' => 'edit', $group['Group']['id'])); ?> </li>
                <li><?php echo $this->Form->postLink('Deletar Grupo', array('action' => 'delete', $group['Group']['id']), null, __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?> </li>
                <li><?php echo $this->Html->link('Listar Grupos', array('action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link('Novo Grupo', array('action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link('Listar Usuários', array('controller' => 'users', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link('Novo Usuário', array('controller' => 'users', 'action' => 'add')); ?> </li>

            </ul>
        </div>
        <div class="span9">
            <h2>Detalhes</h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</dd>
		<dt>Nome</dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
		<dt>Criado em</dt>
		<dd>
			<?php echo h($group['Group']['created']); ?>
			&nbsp;
		</dd>
		<dt>Modificado em</dt>
		<dd>
			<?php echo h($group['Group']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
        </div>

<div class="related">
	<h3>Usuários deste grupo</h3>
	<?php if (!empty($group['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Surname'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Addr Number'); ?></th>
		<th><?php echo __('Addr Complement'); ?></th>
		<th><?php echo __('Addr District'); ?></th>
		<th><?php echo __('Addr City'); ?></th>
		<th><?php echo __('Addr State'); ?></th>
		<th><?php echo __('Addr Country'); ?></th>
		<th><?php echo __('Addr Zip Code'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Celphone'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['surname']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['address']; ?></td>
			<td><?php echo $user['addr_number']; ?></td>
			<td><?php echo $user['addr_complement']; ?></td>
			<td><?php echo $user['addr_district']; ?></td>
			<td><?php echo $user['addr_city']; ?></td>
			<td><?php echo $user['addr_state']; ?></td>
			<td><?php echo $user['addr_country']; ?></td>
			<td><?php echo $user['addr_zip_code']; ?></td>
			<td><?php echo $user['phone']; ?></td>
			<td><?php echo $user['celphone']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
