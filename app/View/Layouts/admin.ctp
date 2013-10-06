<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>/Admin - Cake Base by Redsuns
	</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php
		echo $this->Html->meta('icon');

                echo $this->Html->css('adminstyle');
		echo $this->Html->css('admin');
                
		echo $this->fetch('meta');
		echo $this->fetch('css'); 
		
	?>
</head>
<body class="loggedin">

	<?php echo $this->element('admin/header'); ?>
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	
        <div class="mainleft">
          	<div class="mainleftinner">
            
              	<?php echo $this->element('admin/left_menu'); ?>
                    
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent noright">
        	<div class="maincontentinner">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>
                    <?php echo $this->element('sql_dump'); ?>
                </div><!--maincontentinner-->
        </div><!--maincontent-->
                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    <?php
            
            echo $this->Html->script('jquery');
            echo $this->Html->script('jquery-masked-input');
            echo $this->Html->script('plugins/jquery-ui-1.8.16.custom.min');
            echo $this->Html->script('custom/general');
            echo $this->Html->script('plugins/tinymce/tinymce.min');
            echo $this->Html->script('plugins/jquery.dataTables.min');
            echo $this->Html->script('base');
            
            echo $this->fetch('script');    
            
            echo str_replace('$(document).ready(function ()', 'jQuery(document).ready(function($)', $this->Js->writeBuffer());
        ?>

</body>
    
    
        
        
        <div class="footer">
            <p>Starlight Admin Template &copy; 2012. All Rights Reserved. Designed by: <a href="">ThemePixels.com</a></p>
        </div><!--footer-->
</body>
</html>
