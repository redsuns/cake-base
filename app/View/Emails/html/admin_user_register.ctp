<h3>Bem vindo(a) <?php echo $user['User']['name']; ?>!</h3>
<p>
    Foi realizado seu cadastro com o perfil '<?php echo $group['Group']['name']; ?>' no site 
    <?php echo Configure::read('siteName'); ?> e seguem seus dados de acesso.
    
    <br />
    <br />
    <b>Login:</b> <?php echo $user['User']['username']; ?><br />
    <b>Senha: </b><?php echo $user['User']['password']; ?><br />
   
    
    <br /><br />
    Para maior segurança altere sua senha para uma de sua preferência o mais rápido 
    possível.
    
    <br />
    <br />
    Este e-mail é gerado automaticamente, por favor não o responda.
</p>