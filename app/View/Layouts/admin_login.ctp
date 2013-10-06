<!DOCTYPE html>
<head>
    <?php echo $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Área administrativa | login - Cake Base by Redsuns</title>
    <?php 
        echo $this->Html->css('adminstyle'); 
        echo $this->Html->css('admin'); 
        echo $this->fetch('meta');
        echo $this->fetch('css'); 
    ?>
</head>

<body class="login">

    <div class="loginbox radius3">
        <div class="loginboxinner radius3">
            <div class="loginheader">
                <h1 class="bebas">&nbsp;</h1>
                <div class="logo">
                    <h3 style="color:white;">Cake Base - Area administrativa</h3>
                </div>
            </div><!--loginheader-->

            <div class="loginform">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?> 
            </div><!--loginform-->
        </div><!--loginboxinner-->
    </div><!--loginbox-->

</body>
</html>