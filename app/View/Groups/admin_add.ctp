<div class="maincontentinner">
    <ul class="maintabmenu">
        <li id="admin_index"><?php echo $this->Html->link('Lista', array('controller' => 'groups', 'action' => 'index', 'admin' => true)); ?></li>
        <li id="admin_add"><?php echo $this->Html->link('Adicionar', array('controller' => 'groups', 'action' => 'add', 'admin' => true)); ?></li>
    </ul><!--maintabmenu-->
    <div class="maincontentinner">
        <div class="content">
            <div class="contenttitle radiusbottom0">
                <h2 class="table"><span>Adicionar grupo / perfil</span></h2>
            </div><!--contenttitle-->

            <?php echo $this->Form->create('Group', array('class' => 'stdform')); ?>

            <p><?php
                echo $this->Form->input('name', array('label' => 'Nome'));
                ?></p>

            <?php echo $this->Form->end(array('value' => 'Finalizar', 'label' => 'Finalizar', 'div' => false)); ?>
        </div>
    </div>
</div>

<?php $this->Js->buffer('$(\'#' . $this->params['action'] . '\').addClass(\'current\');');