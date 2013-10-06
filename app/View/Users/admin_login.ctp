<?php echo $this->Form->create('User', array('id' => 'login')); ?>
<p>
    <label for="username" class="bebas">Login</label>
    <?php echo $this->Form->input('username', array('label' => false, 'class' => 'radius2')); ?>
</p>
<p>
    <label for="password" class="bebas">Senha</label>
    <?php echo $this->Form->input('password', array('label' => false, 'class' => 'radius2')); ?>
</p>
<p>
    <button class="radius3 bebas">Entrar</button>
    <?php echo $this->Form->end(); ?>
</p>