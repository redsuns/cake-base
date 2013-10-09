<div class="main">
    <div class="container">

        <div class="row">
            <div class="span12">
                <div class="breadcrumb">
                    <?php echo $this->Html->link('Início', '/'); ?>
                    Usuários
                </div>
                <hr class="hr">
            </div>
        </div>
        <br/>
        <div class="span2">
            <h3>Ações</h3>
            <ul>
                <li><?php echo $this->Html->link('Novo usuário', array('action' => 'add')); ?></li>
                <li><?php echo $this->Html->link('Listar Grupos', array('controller' => 'groups', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link('Novo Grupo', array('controller' => 'groups', 'action' => 'add')); ?> </li>
            </ul>
        </div>
        <div class="span9">
            <h2>Usuários</h2>
            <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('group_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                    <th><?php echo $this->Paginator->sort('surname'); ?></th>
                    <th><?php echo $this->Paginator->sort('email'); ?></th>
                    <th><?php echo $this->Paginator->sort('username'); ?></th>
                    <th><?php echo $this->Paginator->sort('address'); ?></th>
                    <th><?php echo $this->Paginator->sort('addr_number'); ?></th>
                    <th><?php echo $this->Paginator->sort('addr_complement'); ?></th>
                    <th><?php echo $this->Paginator->sort('addr_district'); ?></th>
                    <th><?php echo $this->Paginator->sort('addr_city'); ?></th>
                    <th><?php echo $this->Paginator->sort('addr_state'); ?></th>
                    <th><?php echo $this->Paginator->sort('addr_country'); ?></th>
                    <th><?php echo $this->Paginator->sort('addr_zip_code'); ?></th>
                    <th><?php echo $this->Paginator->sort('phone'); ?></th>
                    <th><?php echo $this->Paginator->sort('cellphone'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                        </td>
                        <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['surname']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['address']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['addr_number']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['addr_complement']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['addr_district']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['addr_city']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['addr_state']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['addr_country']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['addr_zip_code']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['celphone']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link('Detalhes', array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-info btn-mini')); ?>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary btn-mini')); ?>
                            <?php echo $this->Form->postLink('Remover', array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger btn-mini'), __('Tem certeza que deseja remover o usuário %s?', $user['User']['name'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <br clear="all">

        <p>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Página {:page} de {:pages}, exibindo {:current} de {:count} registros localizados, iniciando no registro {:start}, finalizando no registro {:end}')
            ));
            ?>	</p>

        <div class="paging">
            <?php
            echo $this->Paginator->prev('< anterior ', array(), null, array('class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => ''));
            echo $this->Paginator->next(' próximo' . ' >', array(), null, array('class' => 'next disabled'));
            ?>
        </div>
    </div>
</div>