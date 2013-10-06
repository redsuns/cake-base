<div class="maincontentinner">
    <ul class="maintabmenu">
        <li id="admin_index"><?php echo $this->Html->link('Lista', array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?></li>
        <li id="admin_add"><?php echo $this->Html->link('Adicionar', array('controller' => 'users', 'action' => 'add', 'admin' => true)); ?></li>
    </ul><!--maintabmenu-->
    <div class="maincontentinner">
        <div class="content">
            <div class="contenttitle radiusbottom0">
                <h2 class="table"><span>Usuarios</span></h2>
            </div><!--contenttitle-->	
            <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                        <th><?php echo $this->Paginator->sort('group_id', 'Grupo'); ?></th>
                        <th><?php echo $this->Paginator->sort('email'); ?></th>
                        <th><?php echo $this->Paginator->sort('username', 'Login'); ?></th>
                        <th><?php echo $this->Paginator->sort('phone', 'Telefone principal'); ?></th>
                        <th><?php echo $this->Paginator->sort('created', 'Cadastrado'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified', 'Última modificação'); ?></th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                        <th><?php echo $this->Paginator->sort('group_id', 'Grupo'); ?></th>
                        <th><?php echo $this->Paginator->sort('email'); ?></th>
                        <th><?php echo $this->Paginator->sort('username', 'Login'); ?></th>
                        <th><?php echo $this->Paginator->sort('phone', 'Telefone principal'); ?></th>
                        <th><?php echo $this->Paginator->sort('created', 'Cadastrado'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified', 'Última modificação'); ?></th>
                        <th class="actions">Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo h($user['User']['name']); ?>&nbsp;<?php echo h($user['User']['surname']); ?></td>
                            <td>
                                <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                            </td>
                            <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
                            <td><?php echo date('d/m/Y H:i:s', strtotime(h($user['User']['created']))); ?>&nbsp;</td>
                            <td><?php echo date('d/m/Y H:i:s', strtotime(h($user['User']['modified']))); ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Form->postLink(__('Remover'), array('action' => 'delete', $user['User']['id']), null, __('Tem certeza que deseja remover o usuário %s?', $user['User']['name'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br />
            <?php echo $this->element('admin/paginacao'); ?>
        </div>
    </div>
</div>
<?php
$this->Js->buffer('$(\'#' . $this->params['action'] . '\').addClass(\'current\');');