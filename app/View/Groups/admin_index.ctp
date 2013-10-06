<div class="maincontentinner">
    <ul class="maintabmenu">
        <li id="admin_index"><?php echo $this->Html->link('Lista', array('controller' => 'groups', 'action' => 'index', 'admin' => true)); ?></li>
        <li id="admin_add"><?php echo $this->Html->link('Adicionar', array('controller' => 'groups', 'action' => 'add', 'admin' => true)); ?></li>
    </ul><!--maintabmenu-->
    <div class="maincontentinner">
        <div class="content">
            <div class="contenttitle radiusbottom0">
                <h2 class="table"><span>Grupos / Perfis</span></h2>
            </div><!--contenttitle-->	
            <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                        <th><?php echo $this->Paginator->sort('created', 'Cadastrado em'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified', 'Modificado em'); ?></th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                        <th><?php echo $this->Paginator->sort('created', 'Cadastrado em'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified', 'Modificado em'); ?></th>
                        <th class="actions">Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($groups as $group): ?>
                    <tr>
                        <td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
                        <td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
                        <td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
                        <td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link('Detalhes', array('action' => 'view', $group['Group']['id'])); ?>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $group['Group']['id'])); ?>
                            <?php echo $this->Form->postLink('Remover', array('action' => 'delete', $group['Group']['id']), null, __('Tem certeza que deseja remover o grupo %s?', $group['Group']['name'])); ?>
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