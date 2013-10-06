<div class="main">
    <div class="container">

        <div class="row">
            <div class="span12">
                <div class="breadcrumb">
                    <?php echo $this->Html->link('Início', '/'); ?>
                    <?php echo $this->Html->link('Grupos/Perfis', '/groups'); ?>
                    Novo
                </div>
                <hr class="hr">
            </div>
        </div>
        <br/>
        <div class="span2">
            <h3>Ações</h3>
            <ul>

                    <li><?php echo $this->Html->link('Listar Grupos', array('action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link('Listar Usuários', array('controller' => 'users', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link('Novo usuário', array('controller' => 'users', 'action' => 'add')); ?> </li>
            </ul>
        </div>
        <div class="span9">
            <?php echo $this->Form->create('Group'); ?>
            <fieldset>
                <legend>Novo grupo/perfil</legend>
                <?php
                echo $this->Form->input('name', array('label' => 'Nome'));
                ?>
            </fieldset>
            <?php echo $this->Form->end(array('label' => 'Cadastrar', 'value' => 'Cadastrar', 'class' => 'btn btn-primary')); ?>
        </div>
    </div>
</div>

