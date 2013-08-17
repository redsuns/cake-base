<div class="users form">
    <?php
    echo $this->Session->flash();
    echo $this->Session->flash('Auth');
    ?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Login'); ?></legend>
        <?php
        echo $this->Form->inputs(array('username', 'password'), null, array('fieldset' => false));
        ?>
    </fieldset>
    <?php echo $this->Form->end(array('value' => 'Login', 'label' => 'Login')); ?>
</div>