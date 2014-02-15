<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Cake Base by Redsuns:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->meta('keywords', $keywords);
                echo $this->Html->meta('description', $description);

		echo $this->Html->css('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
            <div class="main">
                <div class="row">
                    <div class="span2">&nbsp;</div>
                    <div class="span8">
                        <h1><?php echo $this->Html->link('Cake Base by Redsuns', 'http://redsuns.com.br', array('target' => '_blank')); ?></h1>
                    </div>
                    <div class="span2">&nbsp;</div>
                </div>
            </div>
            <?php if ( $flashMessage = $this->Session->flash() ) : ?>
            <div class="main">
                <div class="row">
                    <div class="span2">&nbsp;</div>
                    <div class="span9">
                        <?php echo $flashMessage; ?>
                    </div>
                    <div class="span1">&nbsp;</div>
                </div>
            </div>
            <?php endif; ?>
		
            
            <?php echo $this->fetch('content'); ?>
	
            
            <div id="footer">
                    <?php echo $this->Html->link(
                                    $this->Html->image('cake.power.gif', array('alt' => 'CakePhp', 'border' => '0')),
                                    'http://www.cakephp.org/',
                                    array('target' => '_blank', 'escape' => false)
                            );
                    ?>
            </div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
        <?php 
            echo $this->Html->script('jquery');
            echo $this->Html->script('jquery-masked-input');
            echo $this->Html->script('bootstrap.min');
            
            if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) {
                echo $this->Js->writeBuffer();
            }
        ?>
</body>
</html>
