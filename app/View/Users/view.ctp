<div class="main">
    <div class="container">

        <div class="row">
            <div class="span12">
                <div class="breadcrumb">
                    <?php echo $this->Html->link('Início', '/'); ?>
                    <?php echo $this->Html->link('Usuários', '/users'); ?>
                    Detalhes
                </div>
                <hr class="hr">
            </div>
        </div>
        <br/>
        <div class="span2">
            <h3>Ações</h3>
            <ul>
                <li><?php echo $this->Html->link('Editar Usuário', array('action' => 'edit', $user['User']['id'])); ?> </li>
                <li><?php echo $this->Form->postLink('Deletar Usuário', array('action' => 'delete', $user['User']['id']), null, __('Tem certeza que deseja remover %s?', $user['User']['name'])); ?> </li>
                <li><?php echo $this->Html->link('Listar Usuários', array('action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link('Novo Usuário', array('action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link('Listar Grupos', array('controller' => 'groups', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link('Novo Grupo', array('controller' => 'groups', 'action' => 'add')); ?> </li>
            </ul>
        </div>
        <div class="span9">

            <h2>Detalhes</h2>
            <dl>
                <dt><?php echo __('Id'); ?></dt>
                <dd>
                    <?php echo h($user['User']['id']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Group'); ?></dt>
                <dd>
                    <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Name'); ?></dt>
                <dd>
                    <?php echo h($user['User']['name']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Surname'); ?></dt>
                <dd>
                    <?php echo h($user['User']['surname']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Email'); ?></dt>
                <dd>
                    <?php echo h($user['User']['email']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Username'); ?></dt>
                <dd>
                    <?php echo h($user['User']['username']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Password'); ?></dt>
                <dd>
                    <?php echo h($user['User']['password']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Address'); ?></dt>
                <dd>
                    <?php echo h($user['User']['address']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Addr Number'); ?></dt>
                <dd>
                    <?php echo h($user['User']['addr_number']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Addr Complement'); ?></dt>
                <dd>
                    <?php echo h($user['User']['addr_complement']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Addr District'); ?></dt>
                <dd>
                    <?php echo h($user['User']['addr_district']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Addr City'); ?></dt>
                <dd>
                    <?php echo h($user['User']['addr_city']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Addr State'); ?></dt>
                <dd>
                    <?php echo h($user['User']['addr_state']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Addr Country'); ?></dt>
                <dd>
                    <?php echo h($user['User']['addr_country']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Addr Zip Code'); ?></dt>
                <dd>
                    <?php echo h($user['User']['addr_zip_code']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Phone'); ?></dt>
                <dd>
                    <?php echo h($user['User']['phone']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Celphone'); ?></dt>
                <dd>
                    <?php echo h($user['User']['cellphone']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Created'); ?></dt>
                <dd>
                    <?php echo h($user['User']['created']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Modified'); ?></dt>
                <dd>
                    <?php echo h($user['User']['modified']); ?>
                    &nbsp;
                </dd>
            </dl>
        </div>
    </div>
</div>