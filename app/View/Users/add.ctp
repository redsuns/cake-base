<div class="main">
    <div class="container">

        <div class="row">
            <div class="span12">
                <div class="breadcrumb">
                    <?php echo $this->Html->link('Início', '/'); ?>
                    <?php echo $this->Html->link('Usuários', '/users'); ?>
                    Novo
                </div>
                <hr class="hr">
            </div>
        </div>
        <br/>
        <div class="span2">
            <h3>Ações</h3>
            <ul>

                <li><?php echo $this->Html->link('Listar Usuários', array('action' => 'index')); ?></li>
                <li><?php echo $this->Html->link('Listar Grupos', array('controller' => 'groups', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link('Novo Grupo', array('controller' => 'groups', 'action' => 'add')); ?> </li>
            </ul>
        </div>
        <div class="span9">
            <?php echo $this->Form->create('User'); ?>
            <fieldset>
                <legend><?php echo __('Add User'); ?></legend>
                <?php
                echo $this->Form->input('group_id');
                echo $this->Form->input('name');
                echo $this->Form->input('surname');
                echo $this->Form->input('email');
                echo $this->Form->input('username');
                echo $this->Form->input('password');
                echo $this->Form->input('address');
                echo $this->Form->input('addr_number');
                echo $this->Form->input('addr_complement');
                echo $this->Form->input('addr_district');
                echo $this->Form->input('addr_city');
                echo $this->Form->input('addr_state');
                echo $this->Form->input('addr_country');
                echo $this->Form->input('addr_zip_code');
                echo $this->Form->input('phone');
                echo $this->Form->input('cellphone');
                ?>
            </fieldset>
            <?php echo $this->Form->end(array('label' => 'Cadastrar', 'value' => 'Cadastrar', 'class' => 'btn btn-primary')); ?>
        </div>
    </div>
</div>