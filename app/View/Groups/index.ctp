<div class="main">
    <div class="container">

        <div class="row">
            <div class="span12">
                <div class="breadcrumb">
                    <?php echo $this->Html->link('Início', '/'); ?>
                    Grupos/Perfis
                </div>
                <hr class="hr">
            </div>
        </div>
        <br/>
        <div class="span2">
            <h3>Ações</h3>
            <ul>
                <li><?php echo $this->Html->link('Novo grupo', array('action' => 'add')); ?></li>
                <li><?php echo $this->Html->link('Listar usuarios', array('controller' => 'users', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link('Novo usuário', array('controller' => 'users', 'action' => 'add')); ?> </li>
            </ul>
        </div>
        <div class="span9">

            <h2>Grupos/Perfis de usuários</h2>
            <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                    <th><?php echo $this->Paginator->sort('created', 'Cadastrado em'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified', 'Modificado em'); ?></th>
                    <th class="actions">Ações</th>
                </tr>
                <?php foreach ($groups as $group): ?>
                    <tr>
                        <td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
                        <td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
                        <td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
                        <td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link('Detalhes', array('action' => 'view', $group['Group']['id']), array('class' => 'btn btn-info btn-mini')); ?>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $group['Group']['id']), array('class' => 'btn btn-primary btn-mini')); ?>
                            <?php echo $this->Form->postLink('Remover', array('action' => 'delete', $group['Group']['id']), array('class' => 'btn btn-danger btn-mini'), __('Tem certeza que deseja remover o grupo %s?', $group['Group']['name'])); ?>
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