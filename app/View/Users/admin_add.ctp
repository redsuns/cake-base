<div class="maincontentinner">
    <ul class="maintabmenu">
        <li id="admin_index"><?php echo $this->Html->link('Lista', array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?></li>
        <li id="admin_add"><?php echo $this->Html->link('Adicionar', array('controller' => 'users', 'action' => 'add', 'admin' => true)); ?></li>
    </ul><!--maintabmenu-->
    <div class="maincontentinner">
        <div class="content">
            <div class="contenttitle radiusbottom0">
                <h2 class="table"><span>Adicionar usuario</span></h2>
            </div><!--contenttitle-->

            <?php echo $this->Form->create('User', array('class' => 'stdform')); ?>

            <p><?php echo $this->Form->input('group_id'); ?></p>
            <p><?php echo $this->Form->input('name'); ?></p>
            <p><?php echo $this->Form->input('surname'); ?></p>
            <p><?php echo $this->Form->input('email'); ?></p>
            <p><?php echo $this->Form->input('username'); ?></p>
            <p><?php echo $this->Form->input('password'); ?></p>
            <p><?php echo $this->Form->input('address'); ?></p>
            <p><?php echo $this->Form->input('addr_number'); ?></p>
            <p><?php echo $this->Form->input('addr_complement'); ?></p>
            <p><?php echo $this->Form->input('addr_district'); ?></p>
            <p><?php echo $this->Form->input('addr_city'); ?></p>
            <p><?php echo $this->Form->input('addr_state'); ?></p>
            <p><?php echo $this->Form->input('addr_country'); ?></p>
            <p><?php echo $this->Form->input('addr_zip_code', array('class' => 'cep')); ?></p>
            <p><?php echo $this->Form->input('phone', array('class' => 'telefone')); ?></p>
            <p><?php echo $this->Form->input('celphone', array('class' => 'telefone')); ?></p>

            <?php echo $this->Form->end(array('value' => 'Finalizar', 'label' => 'Finalizar', 'div' => false)); ?>
        </div>
    </div>
</div>

<?php
$this->Js->buffer('$(\'#' . $this->params['action'] . '\').addClass(\'current\');');